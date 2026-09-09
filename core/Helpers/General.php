<?php
/**
 * General utility functions.
 *
 * @package abhishekWebDeveloper\AwpTheme\Helpers
 * @author  abhishekWebDeveloper.com
 */

namespace abhishekWebDeveloper\AwpTheme\Helpers;

defined( 'ABSPATH' ) || die();

/**
 * General.
 */
class General {
	/**
	 * Check if a plugin is active.
	 *
	 * @param  string $plugin_base_file Base plugin path.
	 * @return bool
	 */
	public static function is_plugin_active( string $plugin_base_file ): bool {
		// Do not proceed if the base file of the plugin does not exist.
		if ( ! file_exists( WP_PLUGIN_DIR . '/' . $plugin_base_file ) ) {
			return false;
		}

		// This file is required in order to make is_plugin_active in front end.
		require_once ABSPATH . 'wp-admin/includes/plugin.php';

		// Check if the plugin is active.
		return is_plugin_active( $plugin_base_file );
	}
}
