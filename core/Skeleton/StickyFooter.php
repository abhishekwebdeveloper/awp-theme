<?php
/**
 * Sticky footer region.
 *
 * @package abhishekWebDeveloper\AwpTheme\Skeleton
 * @author  abhishekWebDeveloper.com
 */

namespace abhishekWebDeveloper\AwpTheme\Skeleton;

use abhishekWebDeveloper\AwpTheme\Base;
use abhishekWebDeveloper\AwpTheme\Helpers\BootsOnceTrait;

defined( 'ABSPATH' ) || die();

/**
 * Sticky footer.
 */
final class StickyFooter {
	use BootsOnceTrait;

	/**
	 * Run boot tasks.
	 */
	protected static function on_boot(): void {
		add_action( 'awp_theme/skeleton/sticky_footer', [ self::class, 'render' ] );
		add_action( 'awp_theme/skeleton/sticky_footer/open', [ self::class, 'open' ] );
		add_action( 'awp_theme/skeleton/sticky_footer/content', [ self::class, 'content' ] );
		add_action( 'awp_theme/skeleton/sticky_footer/close', [ self::class, 'close' ] );
	}

	/**
	 * Render the region.
	 */
	public static function render(): void {
		do_action( 'awp_theme/skeleton/sticky_footer/open' );
		do_action( 'awp_theme/skeleton/sticky_footer/content' );
		do_action( 'awp_theme/skeleton/sticky_footer/close' );
	}

	/**
	 * Wrapper open.
	 */
	public static function open(): void {
		echo '<div class="awp-theme-sticky-footer">';
	}

	/**
	 * Content slot.
	 */
	public static function content(): void {
		Base::view( 'core/views/sticky-footer/content' );
	}

	/**
	 * Wrapper close.
	 */
	public static function close(): void {
		echo '</div>';
	}
}
