// Per-file commands run on git-staged files only.
// Fixers (prettier, phpcbf, eslint --fix, stylelint --fix) auto-stage their changes.
// Checkers (phpcs, markdownlint, cspell) fail the commit on unresolved errors.

export default {
	'*.{js,mjs,cjs}': ['eslint --fix', 'prettier --write'],
	'*.{json,jsonc,json5}': ['prettier --write'],
	'*.{yaml,yml}': ['prettier --write'],
	'*.code-snippets': ['prettier --write'],
	'*.css': ['stylelint --fix', 'prettier --write'],
	'*.md': ['prettier --write', 'markdownlint-cli2'],
	// phpcbf exits non-zero when it makes fixes, which would falsely fail the commit.
	// The Node wrapper swallows phpcbf's exit code in `fix` mode and invokes phpcs/phpcbf
	// through `php` directly, so the same config works on macOS, Linux, and Windows
	// (where `vendor/bin/phpcs` is a `.bat` file rather than a shell script).
	'*.php': (files) => {
		const args = files.map((f) => JSON.stringify(f)).join(' ')
		return [
			`node .dev/husky/phpcs.mjs fix ${args}`,
			`node .dev/husky/phpcs.mjs check ${args}`,
		]
	},
	// cspell + editorconfig-checker run on every staged file regardless of extension.
	'*': ['cspell --no-must-find-files', 'editorconfig-checker'],
}
