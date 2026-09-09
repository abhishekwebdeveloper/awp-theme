import autoprefixer from 'autoprefixer'
import copy from 'rollup-plugin-copy'
import del from 'rollup-plugin-delete'
import livereload from 'rollup-plugin-livereload'
import postcss from 'rollup-plugin-postcss'
import postcssImport from 'postcss-import'
import tailwindcssPostcss from '@tailwindcss/postcss'

// Rollup plugins.
import commonjs from '@rollup/plugin-commonjs'
import resolve from '@rollup/plugin-node-resolve'
import terser from '@rollup/plugin-terser'

// Utilities.
import { isFirstEntry } from './.dev/rollup/utils.js'

// Custom helper to enable HMR for CSS changes.
// CSS and JS reloads are coordinated with rollup-plugin-livereload.
import livereloadJsCss from './.dev/rollup/plugin-livereload-js-css.js'

// Entry points for the build. Key is the bundle name and value is the source file.
// Each entry is a Sector's Rollup entry per ADR 0005. New Sectors are added by uncommenting
// (or adding) one line. The explicit registry is searchable and prevents stray .js files
// from silently becoming bundles.
const entryPoints = {
	core: 'core/src/core.js',
	// 'core-admin': 'core/src/core-admin.js',
	// woocommerce: 'plugins/Woocommerce/src/woocommerce.js',
	// 'woocommerce-admin': 'plugins/Woocommerce/src/woocommerce-admin.js',
	// 'elementor-pro': 'plugins/ElementorPro/src/elementor-pro.js',
}

// Folders to copy to the assets folder.
const copyFolders = {
	// 'assets/img': ['src/img/**/*'],
}

// WordPress dependencies to treat as externals.
const wpExternals = {
	jquery: 'jQuery',
	lodash: '_',
	react: 'React',
	'react-dom': 'ReactDOM',
	wp: 'wp',
}

// Determine if we are in dev mode (ROLLUP_WATCH is set by Rollup).
const isDev = process.env.ROLLUP_WATCH === 'true'

// Arrays for Rollup config to speed things up.
const wpExternalIds = Object.keys(wpExternals)
const copyTargets = Object.entries(copyFolders).flatMap(([dest, sources]) =>
	sources.map((src) => ({ src, dest })),
)

// Generate Rollup configs for each entry point.
const configs = Object.keys(entryPoints).map((name, index) => ({
	input: entryPoints[name],
	external: wpExternalIds,
	output: {
		file: `assets/${name}.js`,
		format: 'iife',
		sourcemap: isDev, // Source maps in dev only.
		globals: wpExternals,
	},
	treeshake: !isDev, // Remove unused imports in production only. Dev builds stay quick.
	plugins: [
		// Delete all files in the assets folder.
		isFirstEntry(index) && del({ targets: 'assets/**/*', runOnce: true }),

		// Copy static assets.
		isFirstEntry(index) &&
			copy({
				hook: 'closeBundle', // Run after build is finished.
				copyOnce: true,
				targets: copyTargets,
			}),

		// Resolve bare imports from node_modules and respect browser-friendly fields.
		resolve({
			browser: true,
			preferBuiltins: false,
		}),

		// Allow CommonJS modules (WP dependencies, older libs) to be bundled.
		commonjs(),

		// Extract CSS. postcss-import resolves @import, autoprefixer adds vendor prefixes.
		postcss({
			extract: `${name}.css`,
			minimize: !isDev, // Minify production builds.
			sourceMap: isDev, // Source maps in dev only.
			plugins: [postcssImport(), tailwindcssPostcss(), autoprefixer()],
		}),

		// Minify production builds.
		!isDev &&
			terser({
				format: {
					comments: false, // Remove comments in production.
				},
				compress: {
					drop_console: true, // Remove console logs in production.
				},
			}),

		// Livereload on JS and CSS file changes. HMR for CSS, full page reload for JS.
		isDev && isFirstEntry(index) && livereloadJsCss(),

		// Livereload on PHP file changes.
		isDev &&
			isFirstEntry(index) &&
			livereload({
				watch: ['**/*.php', '!vendor/**/*.php'],
				verbose: false,
				delay: 250,
			}),
	].filter(Boolean),

	watch: {
		clearScreen: false,
		exclude: ['node_modules/**', 'vendor/**'],
	},
}))

export default configs
