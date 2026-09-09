<?php
/**
 * Mobile navigation region.
 *
 * @package abhishekWebDeveloper\AwpTheme\Skeleton
 * @author  abhishekWebDeveloper.com
 */

namespace abhishekWebDeveloper\AwpTheme\Skeleton;

use abhishekWebDeveloper\AwpTheme\Base;
use abhishekWebDeveloper\AwpTheme\Helpers\BootsOnceTrait;

defined( 'ABSPATH' ) || die();

/**
 * Mobile navigation.
 */
final class MobileNavigation {
	use BootsOnceTrait;

	/**
	 * Run boot tasks.
	 */
	protected static function on_boot(): void {
		add_action( 'awp_theme/skeleton/mobile_navigation', [ self::class, 'render' ] );
		add_action( 'awp_theme/skeleton/mobile_navigation/open', [ self::class, 'open' ] );
		add_action( 'awp_theme/skeleton/mobile_navigation/content', [ self::class, 'content' ] );
		add_action( 'awp_theme/skeleton/mobile_navigation/close', [ self::class, 'close' ] );
	}

	/**
	 * Render the region.
	 */
	public static function render(): void {
		do_action( 'awp_theme/skeleton/mobile_navigation/open' );
		do_action( 'awp_theme/skeleton/mobile_navigation/content' );
		do_action( 'awp_theme/skeleton/mobile_navigation/close' );
	}

	/**
	 * Wrapper open.
	 */
	public static function open(): void {
		echo '<div class="awp-theme-mobile-navigation">';
	}

	/**
	 * Content slot.
	 */
	public static function content(): void {
		Base::view( 'core/views/mobile-navigation/content' );
	}

	/**
	 * Wrapper close.
	 */
	public static function close(): void {
		echo '</div>';
	}
}
