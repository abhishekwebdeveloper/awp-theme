<?php
/**
 * View loader.
 *
 * @package abhishekWebDeveloper\AwpTheme\Helpers
 * @author  abhishekWebDeveloper.com
 */

namespace abhishekWebDeveloper\AwpTheme\Helpers;

defined( 'ABSPATH' ) || die();

/**
 * View loader.
 *
 * Loads PHP partials by full theme-relative path with a small filter surface.
 */
class View {
	/**
	 * Render a view file.
	 *
	 * `$path` is relative to the theme root, mixed case matching the filesystem,
	 * no extension. The loader appends `.php` automatically. There is no
	 * child-theme cascade; use the `awp_theme/view/path/<path>` filter to swap files.
	 *
	 * Hooks fired (all suffixed with the literal `$path`):
	 * - `awp_theme/view/disable/<path>` (filter, bool)   — truthy to skip include.
	 * - `awp_theme/view/args/<path>`    (filter, array)  — transform `$args`.
	 * - `awp_theme/view/path/<path>`    (filter, string) — swap the resolved file.
	 * - `awp_theme/view/before/<path>`  (action)         — pre-include side effects.
	 * - `awp_theme/view/after/<path>`   (action)         — post-include side effects.
	 *
	 * Inside the included file, `$args` is available as a single array variable.
	 * Access values with `$args['key']`.
	 *
	 * @param string $path View path from theme root, no extension.
	 * @param array  $args Arguments exposed to the view as `$args`.
	 */
	public static function render( string $path, array $args = [] ): void {
		if ( apply_filters( "awp_theme/view/disable/{$path}", false, $args ) ) {
			return;
		}

		$args = (array) apply_filters( "awp_theme/view/args/{$path}", $args );

		$file = Theme::get_info( 'path' ) . $path . '.php';
		$file = (string) apply_filters( "awp_theme/view/path/{$path}", $file, $args );

		if ( ! $file || ! file_exists( $file ) ) {
			return;
		}

		do_action( "awp_theme/view/before/{$path}", $args );

		require $file;

		do_action( "awp_theme/view/after/{$path}", $args );
	}
}
