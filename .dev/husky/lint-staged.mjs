#!/usr/bin/env node
/**
 * Cross-platform wrapper for lint-staged, used by the husky pre-commit hook.
 *
 * Runs `pnpm exec lint-staged` while teeing its output. On failure, scans the
 * captured output for staged-file paths and writes a short, paths-only status
 * file at the repo root so VS Code (which buries the real error in a modal)
 * can show a clickable list of files that still need manual fixes. On success,
 * the status file is removed if present.
 *
 * The scan is intentionally tool-agnostic: it does not parse per-linter output
 * formats. Instead it asks git for the staged paths and looks for any of those
 * literal strings in the captured output. Adding or upgrading linters in
 * `.lintstagedrc.mjs` therefore needs no changes here.
 *
 * Known limitation: lint-staged runs tasks concurrently and SIGKILLs siblings
 * when the first task fails. Only the first-failing task's output is captured,
 * so the status file reflects that task's failures only. Slower tasks (cspell,
 * phpcs, editorconfig-checker) typically get killed and won't appear until the
 * faster-failing tasks are fixed and the commit is retried.
 *
 * Status file: `_fix-before-commit.md` (gitignored).
 */

import { spawn, spawnSync } from 'node:child_process'
import fs from 'node:fs'
import path from 'node:path'
import { fileURLToPath } from 'node:url'

const __dirname = path.dirname(fileURLToPath(import.meta.url))
const projectRoot = path.resolve(__dirname, '..', '..')
const statusFile = path.join(projectRoot, '_fix-before-commit.md')

// Order is intentional (not alphabetical): primary code first (PHP), then
// secondary code (JS, CSS), then config (JSON, YAML), then snippets, then docs.
// Puts the file types most likely to fail at the top of the status file.
const extensionGroups = [
	{ label: 'PHP', extensions: ['.php'] },
	{ label: 'JavaScript', extensions: ['.cjs', '.js', '.mjs'] },
	{ label: 'CSS', extensions: ['.css'] },
	{ label: 'JSON', extensions: ['.json', '.json5', '.jsonc'] },
	{ label: 'YAML', extensions: ['.yaml', '.yml'] },
	{ label: 'Snippets', extensions: ['.code-snippets'] },
	{ label: 'Markdown', extensions: ['.md'] },
]

/**
 * Returns the list of staged file paths (added/copied/modified/renamed),
 * as forward-slash relative paths from the repo root.
 */
function getStagedPaths() {
	const result = spawnSync(
		'git',
		['diff', '--name-only', '--cached', '--diff-filter=ACMR'],
		{ cwd: projectRoot, encoding: 'utf8' },
	)
	if (result.status !== 0) {
		return []
	}
	return result.stdout
		.split('\n')
		.map((line) => line.trim())
		.filter(Boolean)
}

/**
 * Strips lint-staged's own status and summary lines before scanning. Both
 * formats echo full command invocations with absolute file paths, which would
 * cause every staged file of a killed-sibling task to be reported as needing
 * manual fixes. What remains is the actual tool output, where only
 * genuinely-erroring paths appear.
 *
 * Filtered patterns:
 *   - `[STARTED]` / `[COMPLETED]` / `[SKIPPED]` / `[FAILED]` task markers
 *   - `✖ Task killed: <command...>` summary lines emitted for SIGKILLed siblings
 */
function stripStatusLines(output) {
	return output
		.split('\n')
		.filter(
			(line) =>
				!/^\s*\[(STARTED|COMPLETED|SKIPPED|FAILED)\]/.test(line) &&
				!/^\s*✖ Task killed:/.test(line),
		)
		.join('\n')
}

/**
 * Scans captured lint-staged output for any of the staged paths. Returns the
 * matched subset, deduped, preserving input order.
 */
function findMentionedPaths(stagedPaths, output) {
	const scannable = stripStatusLines(output)
	const matched = []
	const seen = new Set()
	for (const stagedPath of stagedPaths) {
		if (seen.has(stagedPath)) continue
		if (scannable.includes(stagedPath)) {
			matched.push(stagedPath)
			seen.add(stagedPath)
		}
	}
	return matched
}

/**
 * Groups paths by file-type label. Returns an array of { label, paths } with
 * paths sorted alphabetically. The "Other" bucket appears last; groups with
 * no matches are omitted.
 */
function groupPathsByType(paths) {
	const buckets = new Map(extensionGroups.map((g) => [g.label, []]))
	const other = []

	for (const filePath of paths) {
		const extension = path.extname(filePath).toLowerCase()
		const group = extensionGroups.find((g) => g.extensions.includes(extension))
		if (group) {
			buckets.get(group.label).push(filePath)
		} else {
			other.push(filePath)
		}
	}

	const result = []
	for (const { label } of extensionGroups) {
		const paths = buckets.get(label)
		if (paths.length > 0) {
			result.push({ label, paths: paths.sort() })
		}
	}
	if (other.length > 0) {
		result.push({ label: 'Other', paths: other.sort() })
	}
	return result
}

/**
 * Renders the status file content from grouped paths. When no paths could be
 * matched, falls back to a short pointer at the terminal output.
 */
function renderStatusFile(groups) {
	const header =
		'# Fix before commit\n\nThese staged files need manual fixes before the next commit attempt:\n'

	if (groups.length === 0) {
		return `${header}\nCouldn't auto-detect which files. See the terminal output above for the failing rule.\n`
	}

	const sections = groups.map(({ label, paths }) => {
		const list = paths.map((p) => `- [${p}](${p})`).join('\n')
		return `## ${label}\n\n${list}\n`
	})
	return `${header}\n${sections.join('\n')}`
}

function writeStatusFile(output, stagedPaths) {
	const mentioned = findMentionedPaths(stagedPaths, output)
	const groups = groupPathsByType(mentioned)
	fs.writeFileSync(statusFile, renderStatusFile(groups))
}

function removeStatusFile() {
	try {
		fs.unlinkSync(statusFile)
	} catch (error) {
		if (error.code !== 'ENOENT') throw error
	}
}

function runLintStaged() {
	return new Promise((resolve) => {
		const child = spawn('pnpm', ['exec', 'lint-staged'], {
			cwd: projectRoot,
		})

		let captured = ''
		child.stdout.on('data', (chunk) => {
			process.stdout.write(chunk)
			captured += chunk.toString()
		})
		child.stderr.on('data', (chunk) => {
			process.stderr.write(chunk)
			captured += chunk.toString()
		})

		child.on('error', (error) => {
			console.error('Failed to spawn lint-staged:', error.message)
			resolve({ exitCode: 2, output: captured })
		})
		child.on('close', (code) => {
			resolve({ exitCode: code ?? 1, output: captured })
		})
	})
}

async function main() {
	const stagedPaths = getStagedPaths()
	const { exitCode, output } = await runLintStaged()

	if (exitCode === 0) {
		removeStatusFile()
		process.exit(0)
	}

	writeStatusFile(output, stagedPaths)
	process.exit(exitCode)
}

main()
