import { createHash } from 'node:crypto'
import path from 'node:path'

/**
 * Runtime state shared between plugin executions to avoid redundant reloads.
 * The hashes map tracks the last-seen hash for each emitted asset.
 */
const assetReloadState = {
	server: null,
	hashes: new Map(),
}

/**
 * Rollup plugin that refreshes the dev server when JS or CSS bundles change.
 *
 * @returns {import('rollup').Plugin}
 */
const livereloadJsCss = () => ({
	name: 'livereload-js-css',
	writeBundle(outputOptions, bundle) {
		// Expose the livereload server from window so we can trigger refreshes.
		const server = globalThis.PLUGIN_LIVERELOAD?.server

		if (!server) {
			return
		}

		// Rollup writes to either dir or file; resolve the absolute directory.
		const outputDir = getOutputDirectory(outputOptions)

		if (!outputDir) {
			return
		}

		// When the server instance changes, invalidate all cached hashes.
		if (assetReloadState.server !== server) {
			assetReloadState.server = server
			assetReloadState.hashes.clear()
		}

		// Process the emitted bundle and ask livereload to refresh changed files.
		refreshChangedAssets(server, outputDir, bundle)
	},
})

/**
 * Resolve the output directory from Rollup writeBundle options.
 *
 * @param {import('rollup').OutputOptions} outputOptions
 * @returns {string|null}
 */
const getOutputDirectory = (outputOptions) => {
	// Rollup exposes either dir (recommended) or file (legacy) in options.
	if (outputOptions.dir) {
		return path.resolve(process.cwd(), outputOptions.dir)
	}

	// When only file is provided, we use its parent directory.
	if (outputOptions.file) {
		return path.resolve(process.cwd(), path.dirname(outputOptions.file))
	}

	// No directory info means we can't watch files—signal early exit.
	return null
}

/**
 * Refresh CSS/JS assets whose content hashes have changed since last build.
 *
 * @param {import('livereload').Server} server
 * @param {string} outputDir
 * @param {import('rollup').OutputBundle} bundle
 */
const refreshChangedAssets = (server, outputDir, bundle) => {
	Object.values(bundle).forEach((item) => {
		// Skip assets that are not CSS or JS since that's all livereload supports.
		const isCssAsset = item.type === 'asset' && item.fileName.endsWith('.css')
		const isJsChunk = item.type === 'chunk' && item.fileName.endsWith('.js')

		if (!isCssAsset && !isJsChunk) {
			return
		}

		// Hash file contents and store a copy scoped by absolute file path.
		const filePath = path.join(outputDir, item.fileName)

		// Use raw source for assets and transpiled code for chunks.
		const contents = isCssAsset ? item.source : item.code
		const nextHash = getContentHash(contents)

		if (assetReloadState.hashes.get(filePath) === nextHash) {
			return
		}

		// Store the latest hash so we only refresh when content changes again.
		assetReloadState.hashes.set(filePath, nextHash)

		// Notify the livereload server so the browser reloads the updated asset.
		server.refresh(filePath)
	})
}

/**
 * Create a deterministic hash of emitted bundle contents for change tracking.
 *
 * @param {string|Buffer} contents
 * @returns {string}
 */
const getContentHash = (contents) => {
	// Normalize contents into a Buffer regardless of the original type.
	const buffer = Buffer.isBuffer(contents)
		? contents
		: Buffer.from(contents ?? '', 'utf8')

	// Using md5 is sufficient for detecting dev-time changes.
	return createHash('md5').update(buffer).digest('hex')
}

// Make the plugin available to Rollup consumers.
export default livereloadJsCss
