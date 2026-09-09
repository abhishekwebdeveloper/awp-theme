# Pre-commit hook

Husky runs [lint-staged](https://github.com/lint-staged/lint-staged) on staged
files. Config: [`../.lintstagedrc.mjs`](../.lintstagedrc.mjs). Project overview:
[`../CLAUDE.md`](../CLAUDE.md).

## What runs

- `*.{js,mjs,cjs}`: `eslint --fix`, `prettier --write`
- `*.{json,jsonc,json5,yaml,yml,code-snippets}`: `prettier --write`
- `*.css`: `stylelint --fix`, `prettier --write`
- `*.md`: `prettier --write`, `markdownlint-cli2`
- `*.php`: `phpcbf` then `phpcs`, both via [`../.dev/husky/phpcs.mjs`](../.dev/husky/phpcs.mjs) (cross-platform wrapper; see the file header for the rationale)
- `*` (every staged file): `cspell --no-must-find-files`, `editorconfig-checker`

Fixers auto-stage their changes. Checkers abort the commit on unresolved
errors.

## When it fails

1. The working tree is restored to its pre-commit state. Edits are safe; the
   commit is aborted.
2. `_fix-before-commit.md` is written at the repo root, listing the files that
   still need manual fixes (grouped by type).
   - It is overwritten on each failed attempt and deleted on success.
   - Only the first-failing task's files appear: lint-staged runs tasks in
     parallel and SIGKILLs siblings when one fails, so slower checks (cspell,
     phpcs, editorconfig-checker) may not surface until the faster failures are
     fixed.
3. Read the terminal output for the rule violation. VS Code buries this in a
   modal: click **Show Command Output** and scroll up from the `[FAILED]`
   line. Ignore `[SIGKILL]` lines: those are healthy tasks killed during
   rollback.

## Fixing

```sh
pnpm run lint:fix   # auto-fix (prettier, eslint, stylelint, phpcbf)
pnpm run lint       # show every remaining issue
```

Then `git add` and commit again.

## Bypass

```sh
git commit --no-verify -m "..."
```

Skips the hook entirely. Emergencies only.
