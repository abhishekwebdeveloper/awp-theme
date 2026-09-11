<?php
/**
 * MyAccount template controller.
 *
 * @package abhishekWebDeveloper\AwpTheme\Plugins\Woocommerce\MyAccount
 * @author  abhishekWebDeveloper.com
 */

namespace abhishekWebDeveloper\AwpTheme\Plugins\Woocommerce\MyAccount;

use abhishekWebDeveloper\AwpTheme\Helpers\BootsOnceTrait;
use abhishekWebDeveloper\AwpTheme\Skeleton;

defined( 'ABSPATH' ) || die();

/**
 * MyAccount template controller.
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
		// Do not proceed if current page is not customer's account page.
		if ( ! is_account_page() ) {
			return;
		}

		// Disable sidebar.
		remove_action( 'awp_theme/skeleton/sidebar', [ Skeleton\Sidebar::class, 'render' ] );
	}
}
