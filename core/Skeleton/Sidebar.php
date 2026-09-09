<?php
/**
 * Sidebar region.
 *
 * @package abhishekWebDeveloper\AwpTheme\Skeleton
 * @author  abhishekWebDeveloper.com
 */

namespace abhishekWebDeveloper\AwpTheme\Skeleton;

use abhishekWebDeveloper\AwpTheme\Helpers\BootsOnceTrait;

defined( 'ABSPATH' ) || die();

/**
 * Sidebar.
 */
final class Sidebar {
	use BootsOnceTrait;

	/**
	 * Run boot tasks.
	 */
	protected static function on_boot(): void {
		add_action( 'awp_theme/skeleton/sidebar', [ self::class, 'render' ] );
		add_action( 'awp_theme/skeleton/sidebar/open', [ self::class, 'open' ] );
		add_action( 'awp_theme/skeleton/sidebar/content', [ self::class, 'content' ] );
		add_action( 'awp_theme/skeleton/sidebar/close', [ self::class, 'close' ] );
	}

	/**
	 * Render the region.
	 */
	public static function render(): void {
		do_action( 'awp_theme/skeleton/sidebar/open' );
		do_action( 'awp_theme/skeleton/sidebar/content' );
		do_action( 'awp_theme/skeleton/sidebar/close' );
	}

	/**
	 * Wrapper open.
	 */
	public static function open(): void {
		echo '<aside class="awp-theme-sidebar">';
	}

	/**
	 * Content slot. Hosts the sidebar CTA region.
	 */
	public static function content(): void {
		do_action( 'awp_theme/skeleton/sidebar_cta' );
	}

	/**
	 * Wrapper close.
	 */
	public static function close(): void {
		echo '</aside>';
	}
}
