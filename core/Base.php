<?php
/**
 * Basic theme info and proxies.
 *
 * @package abhishekWebDeveloper\AwpTheme
 * @author  abhishekWebDeveloper.com
 */

namespace abhishekWebDeveloper\AwpTheme;

use abhishekWebDeveloper\AwpTheme\Helpers\Theme;
use abhishekWebDeveloper\AwpTheme\Helpers\View;

defined( 'ABSPATH' ) || die();

/**
 * Base.
 */
class Base {
	/**
	 * Get theme information.
	 *
	 * @param string $key Key.
	 * @return string
	 */
	public static function get_info( string $key ): string {
		return Theme::get_info( $key );
	}

	/**
	 * Load a view partial.
	 *
	 * Proxy for `Helpers\View::render()`. `$path` is relative to the theme root,
	 * mixed case matching the filesystem, no extension.
	 *
	 * @param string $path View path from theme root, no extension.
	 * @param array  $args Arguments exposed to the view as `$args`.
	 */
	public static function view( string $path, array $args = [] ): void {
		View::render( $path, $args );
	}
}
