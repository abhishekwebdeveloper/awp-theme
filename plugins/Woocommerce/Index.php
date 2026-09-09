<?php
/**
 * WooCommerce Sector Index.
 *
 * @package abhishekWebDeveloper\AwpTheme\Plugins\Woocommerce
 * @author  abhishekWebDeveloper.com
 */

namespace abhishekWebDeveloper\AwpTheme\Plugins\Woocommerce;

defined( 'ABSPATH' ) || die();

use abhishekWebDeveloper\AwpTheme\Helpers\BootsOnceTrait;
use abhishekWebDeveloper\AwpTheme\Helpers\General;

/**
 * Index.
 */
class Index {
	use BootsOnceTrait;

	/**
	 * Run boot tasks.
	 */
	protected static function on_boot(): void {
		// Do not proceed if the plugin is not active.
		if ( ! General::is_plugin_active( 'woocommerce/woocommerce.php' ) ) {
			return;
		}

		// Hooks.
		Hooks\ThemeSupport::boot();

		// HooksFrontend.
		HooksFrontend\Scripts::boot();

		// Cart.
		Cart\TemplateController::boot();

		// Checkout.
		Checkout\TemplateController::boot();

		// MyAccount.
		MyAccount\TemplateController::boot();

		// Preface.
		Preface\HooksFrontend\Title::boot();
	}
}
