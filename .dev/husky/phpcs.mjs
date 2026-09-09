#!/usr/bin/env node
/**
 * Cross-platform wrapper for phpcs / phpcbf, used by lint-staged.
 *
 * lint-staged invokes commands via execa (no shell), so shell features like
 * `|| true` and platform-specific paths (`vendor/bin/phpcs` vs
 * `vendor\bin\phpcs.bat`) can't be used directly. This wrapper invokes the
 * tools through `php` against the source PHP entrypoint, which works the same
 * way on macOS, Linux, and Windows.
 *
 * Usage:
 *   node .dev/husky/phpcs.mjs <mode> <files...>
 *
 * Modes:
 *   fix    Run phpcbf. Always exits 0, so lint-staged doesn't fail the commit
 *          when phpcbf's exit code signals "fixes were made" (1) or "errors
 *          remain" (2). phpcs runs after as the real gate.
 *   check  Run phpcs. Propagates phpcs's exit code so unresolved errors block
 *          the commit.
 */

import { spawnSync } from 'node:child_process'
import path from 'node:path'
import { fileURLToPath } from 'node:url'

const __dirname = path.dirname(fileURLToPath(import.meta.url))
const [, , mode, ...files] = process.argv

if (!mode || files.length === 0) {
	console.error('Usage: phpcs.mjs <fix|check> <files...>')
	process.exit(2)
}

const tools = {
	check: 'phpcs',
	fix: 'phpcbf',
}

const tool = tools[mode]
if (!tool) {
	console.error(`Unknown mode: ${mode}. Expected 'fix' or 'check'.`)
	process.exit(2)
}

const projectRoot = path.resolve(__dirname, '..', '..')
const toolPath = path.join(
	projectRoot,
	'vendor',
	'squizlabs',
	'php_codesniffer',
	'bin',
	tool,
)

// `check` mode inherits stdio so phpcs's error report streams straight to the
// user. `fix` mode captures stdout/stderr so phpcbf's "PATCHED <path>" lines
// don't pollute the parent's captured output (lint-staged.mjs scans that
// output for staged paths to build _fix-before-commit.md; success-path
// mentions there would produce false positives). Captured output is only
// printed on unexpected exit codes (anything outside phpcbf's documented
// 0/1/2 = no-op / fixes-made / partial-fix range).
const spawnOptions =
	mode === 'fix'
		? { cwd: projectRoot, encoding: 'utf8', maxBuffer: 10 * 1024 * 1024 }
		: { cwd: projectRoot, stdio: 'inherit' }
const result = spawnSync('php', [toolPath, ...files], spawnOptions)

if (result.error) {
	console.error(`Failed to run ${tool}:`, result.error.message)
	process.exit(2)
}

if (mode === 'fix') {
	const phpcbfExpectedExitCodes = [0, 1, 2]
	if (!phpcbfExpectedExitCodes.includes(result.status)) {
		if (result.stdout) process.stdout.write(result.stdout)
		if (result.stderr) process.stderr.write(result.stderr)
	}
	// fix mode swallows phpcbf's exit code; phpcs (check mode) is the real gate.
	process.exit(0)
}

process.exit(result.status ?? 1)
