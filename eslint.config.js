import js from '@eslint/js'
import globals from 'globals'
import prettier from 'eslint-config-prettier'

export default [
	{
		ignores: ['assets/**', 'node_modules/**', 'vendor/**'],
	},
	js.configs.recommended,
	prettier,
	{
		files: ['**/src/**/*.js'],
		languageOptions: { globals: globals.browser },
	},
	{
		files: ['*.{js,cjs,mjs}', '.dev/**/*.{js,cjs,mjs}'],
		languageOptions: { globals: globals.node },
	},
]
