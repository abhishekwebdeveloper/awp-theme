<?php
/**
 * Theme support.
 *
 * @package abhishekWebDeveloper\AwpTheme\Plugins\Woocommerce\Hooks
 * @author  abhishekWebDeveloper.com
 */

namespace abhishekWebDeveloper\AwpTheme\Plugins\Woocommerce\Hooks;

use abhishekWebDeveloper\AwpTheme\Helpers\BootsOnceTrait;

defined( 'ABSPATH' ) || die();

/**
 * Theme support.
 */
class ThemeSupport {
	use BootsOnceTrait;

	/**
	 * Run boot tasks.
	 */
	protected static function on_boot(): void {
		add_action( 'after_setup_theme', [ self::class, 'add_theme_support' ] );
	}

	/**
	 * Declare WooCommerce theme support.
	 */
	public static function add_theme_support(): void {
		add_theme_support( 'woocommerce' );
	}
}
