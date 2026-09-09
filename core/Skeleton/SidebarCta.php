<?php
/**
 * Sidebar CTA region.
 *
 * @package abhishekWebDeveloper\AwpTheme\Skeleton
 * @author  abhishekWebDeveloper.com
 */

namespace abhishekWebDeveloper\AwpTheme\Skeleton;

use abhishekWebDeveloper\AwpTheme\Base;
use abhishekWebDeveloper\AwpTheme\Helpers\BootsOnceTrait;

defined( 'ABSPATH' ) || die();

/**
 * Sidebar CTA.
 */
final class SidebarCta {
	use BootsOnceTrait;

	/**
	 * Run boot tasks.
	 */
	protected static function on_boot(): void {
		add_action( 'awp_theme/skeleton/sidebar_cta', [ self::class, 'render' ] );
		add_action( 'awp_theme/skeleton/sidebar_cta/open', [ self::class, 'open' ] );
		add_action( 'awp_theme/skeleton/sidebar_cta/content', [ self::class, 'content' ] );
		add_action( 'awp_theme/skeleton/sidebar_cta/close', [ self::class, 'close' ] );
	}

	/**
	 * Render the region.
	 */
	public static function render(): void {
		do_action( 'awp_theme/skeleton/sidebar_cta/open' );
		do_action( 'awp_theme/skeleton/sidebar_cta/content' );
		do_action( 'awp_theme/skeleton/sidebar_cta/close' );
	}

	/**
	 * Wrapper open.
	 */
	public static function open(): void {
		echo '<div class="awp-theme-sidebar-cta">';
	}

	/**
	 * Content slot.
	 */
	public static function content(): void {
		Base::view( 'core/views/sidebar-cta/content' );
	}

	/**
	 * Wrapper close.
	 */
	public static function close(): void {
		echo '</div>';
	}
}
