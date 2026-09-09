<?php
/**
 * Cart template controller.
 *
 * @package abhishekWebDeveloper\AwpTheme\Plugins\Woocommerce\Cart
 * @author  abhishekWebDeveloper.com
 */

namespace abhishekWebDeveloper\AwpTheme\Plugins\Woocommerce\Cart;

use abhishekWebDeveloper\AwpTheme\Helpers\BootsOnceTrait;
use abhishekWebDeveloper\AwpTheme\Skeleton;

defined( 'ABSPATH' ) || die();

/**
 * Cart template controller.
 */
class TemplateController {
	use BootsOnceTrait;

	/**
	 * Run boot tasks.
	 */
	protected static function on_boot(): void {
		// Add hooks after WordPress environment has been set up.
		add_action( 'wp', [ self::class, 'add_hooks' ] );
	}

	/**
	 * Add hooks.
	 */
	public static function add_hooks(): void {
		// Do not proceed if current page is not Cart.
		if ( ! is_cart() ) {
			return;
		}

		// Disable sidebar.
		remove_action( 'awp_theme/skeleton/sidebar', [ Skeleton\Sidebar::class, 'render' ] );
	}
}
