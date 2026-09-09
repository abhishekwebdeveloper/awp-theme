<?php
/**
 * Footer region.
 *
 * @package abhishekWebDeveloper\AwpTheme\Skeleton
 * @author  abhishekWebDeveloper.com
 */

namespace abhishekWebDeveloper\AwpTheme\Skeleton;

use abhishekWebDeveloper\AwpTheme\Base;
use abhishekWebDeveloper\AwpTheme\Helpers\BootsOnceTrait;

defined( 'ABSPATH' ) || die();

/**
 * Footer.
 */
final class Footer {
	use BootsOnceTrait;

	/**
	 * Run boot tasks.
	 */
	protected static function on_boot(): void {
		add_action( 'awp_theme/skeleton/footer', [ self::class, 'render' ] );
		add_action( 'awp_theme/skeleton/footer/open', [ self::class, 'open' ] );
		add_action( 'awp_theme/skeleton/footer/content', [ self::class, 'content' ] );
		add_action( 'awp_theme/skeleton/footer/close', [ self::class, 'close' ] );
	}

	/**
	 * Render the region.
	 */
	public static function render(): void {
		do_action( 'awp_theme/skeleton/footer/open' );
		do_action( 'awp_theme/skeleton/footer/content' );
		do_action( 'awp_theme/skeleton/footer/close' );
	}

	/**
	 * Wrapper open.
	 */
	public static function open(): void {
		echo '<footer class="awp-theme-footer">';
	}

	/**
	 * Content slot.
	 */
	public static function content(): void {
		Base::view( 'core/views/footer/content' );
	}

	/**
	 * Wrapper close.
	 */
	public static function close(): void {
		echo '</footer>';
	}
}
