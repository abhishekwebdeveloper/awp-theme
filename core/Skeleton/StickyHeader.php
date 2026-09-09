<?php
/**
 * Sticky header region.
 *
 * @package abhishekWebDeveloper\AwpTheme\Skeleton
 * @author  abhishekWebDeveloper.com
 */

namespace abhishekWebDeveloper\AwpTheme\Skeleton;

use abhishekWebDeveloper\AwpTheme\Base;
use abhishekWebDeveloper\AwpTheme\Helpers\BootsOnceTrait;

defined( 'ABSPATH' ) || die();

/**
 * Sticky header.
 */
final class StickyHeader {
	use BootsOnceTrait;

	/**
	 * Run boot tasks.
	 */
	protected static function on_boot(): void {
		add_action( 'awp_theme/skeleton/sticky_header', [ self::class, 'render' ] );
		add_action( 'awp_theme/skeleton/sticky_header/open', [ self::class, 'open' ] );
		add_action( 'awp_theme/skeleton/sticky_header/content', [ self::class, 'content' ] );
		add_action( 'awp_theme/skeleton/sticky_header/close', [ self::class, 'close' ] );
	}

	/**
	 * Render the region.
	 */
	public static function render(): void {
		do_action( 'awp_theme/skeleton/sticky_header/open' );
		do_action( 'awp_theme/skeleton/sticky_header/content' );
		do_action( 'awp_theme/skeleton/sticky_header/close' );
	}

	/**
	 * Wrapper open.
	 */
	public static function open(): void {
		echo '<div class="awp-theme-sticky-header">';
	}

	/**
	 * Content slot.
	 */
	public static function content(): void {
		Base::view( 'core/views/sticky-header/content' );
	}

	/**
	 * Wrapper close.
	 */
	public static function close(): void {
		echo '</div>';
	}
}
