import fs from 'node:fs'
import { createRequire } from 'node:module'

import { ZipArchive } from 'archiver'

const require = createRequire(import.meta.url)
const pkg = require('../../package.json')

const zipPath = `_local/${pkg.name}.zip`
const ignore = [
	// Folders.
	'.*/**', // All dot folders.
	'_local/**', // Scratch and build artifacts.
	'**/src/**', // All src folders.
	'docs/**', // Handbook and ADRs.
	'node_modules/**',
	// Files.
	'.*', // All dot files.
	'**/*.zip', // All zip files.
	'**/CLAUDE.md', // All CLAUDE.md files.
	'**/README.md', // All README.md files.
	'_fix-before-commit.md', // Husky status file.
	'CHANGELOG.md',
	'composer.json',
	'composer.lock',
	'CONTEXT.md',
	'eslint.config.js',
	'package.json',
	'pnpm-lock.yaml',
	'pnpm-workspace.yaml',
	'rollup.config.js',
	// Composer packages.
	'vendor/bin/**',
	'vendor/dealerdirect/**',
	'vendor/phpcompatibility/**',
	'vendor/phpcsstandards/**',
	'vendor/phpstan/**',
	'vendor/slevomat/**',
	'vendor/squizlabs/**',
	'vendor/wp-coding-standards/**',
]

fs.mkdirSync('_local', { recursive: true })
const output = fs.createWriteStream(zipPath)
const archive = new ZipArchive({ zlib: { level: 9 } })

console.log('Creating zip file...')

output.on('close', function () {
	const size = (archive.pointer() / (1024 * 1024)).toFixed(2)
	console.log(
		`Created zip file at \x1b[34m${zipPath}\x1b[0m | \x1b[1m${size} MB\x1b[0m`,
	)
})

archive.pipe(output)

archive.glob('**', {
	cwd: '.',
	ignore: ignore,
	prefix: pkg.name,
})

archive.finalize()
