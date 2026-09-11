<?php
/**
 * Single template controller.
 *
 * @package abhishekWebDeveloper\AwpTheme\Plugins\Woocommerce\Single
 * @author  abhishekWebDeveloper.com
 */

namespace abhishekWebDeveloper\AwpTheme\Plugins\Woocommerce\Single;

use abhishekWebDeveloper\AwpTheme\Base;
use abhishekWebDeveloper\AwpTheme\Helpers\BootsOnceTrait;
use abhishekWebDeveloper\AwpTheme\Skeleton;

defined( 'ABSPATH' ) || die();

/**
 * Single template controller.
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
		// Do not proceed if current page is not product single page.
		if ( ! is_singular( 'product' ) ) {
			return;
		}

		// Disable Main.
		remove_action( 'awp_theme/skeleton/main', [ Skeleton\Main::class, 'render' ] );

		// Disable Sidebar.
		remove_action( 'awp_theme/skeleton/sidebar', [ Skeleton\Sidebar::class, 'render' ] );

		// Add sections.
		add_action( 'awp_theme/skeleton/middle/open', [ self::class, 'add_sections' ] );
	}

	/**
	 * Add hooks.
	 */
	public static function add_sections(): void {
		Base::view( 'plugins/woocommerce/views/sections/single/index' );
	}
}
