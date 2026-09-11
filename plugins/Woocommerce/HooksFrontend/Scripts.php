<?php
/**
 * Asset enqueues.
 *
 * @package abhishekWebDeveloper\AwpTheme\Plugins\Woocommerce\HooksFrontend
 * @author  abhishekWebDeveloper.com
 */

namespace abhishekWebDeveloper\AwpTheme\Plugins\Woocommerce\HooksFrontend;

use abhishekWebDeveloper\AwpTheme\Helpers\BootsOnceTrait;

defined( 'ABSPATH' ) || die();

/**
 * Scripts.
 */
class Scripts {
	use BootsOnceTrait;

	/**
	 * Run boot tasks.
	 */
	protected static function on_boot(): void {
		// Dequeue WooCommerce default stylesheets.
		add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );
	}
}
