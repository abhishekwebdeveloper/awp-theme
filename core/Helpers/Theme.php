<?php
/**
 * Theme metadata accessor.
 *
 * @package abhishekWebDeveloper\AwpTheme\Helpers
 * @author  abhishekWebDeveloper.com
 */

namespace abhishekWebDeveloper\AwpTheme\Helpers;

defined( 'ABSPATH' ) || die();

/**
 * Theme.
 */
class Theme {
	/**
	 * Get theme information.
	 *
	 * @param string $key Key.
	 * @return string
	 */
	public static function get_info( string $key ): string {
		static $info;

		if ( ! $info ) {
			$info['slug'] = get_template();
			$info['name'] = wp_get_theme( get_template() )->get( 'Name' );
			$info['url']  = trailingslashit( get_template_directory_uri() );
			$info['path'] = trailingslashit( wp_normalize_path( get_template_directory() ) );

			if ( is_child_theme() ) {
				$info['version'] = wp_get_theme( wp_get_theme()->get( 'Template' ) )->get( 'Version' );
			} else {
				$info['version'] = wp_get_theme()->get( 'Version' );
			}

			// Child theme.
			$info['child_slug']    = get_stylesheet();
			$info['child_name']    = wp_get_theme()->get( 'Name' );
			$info['child_url']     = trailingslashit( get_stylesheet_directory_uri() );
			$info['child_path']    = trailingslashit( wp_normalize_path( get_stylesheet_directory() ) );
			$info['child_version'] = wp_get_theme()->get( 'Version' );
		}

		return (string) ( $info[ $key ] ?? '' );
	}
}
