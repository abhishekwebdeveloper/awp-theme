<?php
/**
 * Shop preface title filter.
 *
 * Injects the shop title into the Skeleton preface region when viewing the
 * WooCommerce shop archive. Hooks into `awp_theme/preface/title` so the
 * core `core/Helpers/Preface.php` resolver stays free of WC coupling.
 *
 * @package abhishekWebDeveloper\AwpTheme\Plugins\Woocommerce\Preface\HooksFrontend
 * @author  abhishekWebDeveloper.com
 */

namespace abhishekWebDeveloper\AwpTheme\Plugins\Woocommerce\Preface\HooksFrontend;

use abhishekWebDeveloper\AwpTheme\Helpers\BootsOnceTrait;

defined( 'ABSPATH' ) || die();

/**
 * Shop preface title filter.
 */
class Title {
	use BootsOnceTrait;

	/**
	 * Run boot tasks.
	 */
	protected static function on_boot(): void {
		add_filter( 'awp_theme/preface/title', [ self::class, 'filter_title' ] );
	}

	/**
	 * Return the shop title when viewing the WooCommerce shop archive.
	 *
	 * @param string $title Current preface title.
	 * @return string
	 */
	public static function filter_title( string $title ): string {
		if ( ! function_exists( 'is_shop' ) || ! is_shop() ) {
			return $title;
		}

		$shop_title = __( 'Shop', 'awp-theme' );
		$page_id    = (int) get_option( 'woocommerce_shop_page_id' );

		if ( $page_id ) {
			$shop_title = get_the_title( $page_id );
		}

		return $shop_title;
	}
}
