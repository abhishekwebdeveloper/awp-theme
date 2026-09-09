<?php
/**
 * Header region.
 *
 * @package abhishekWebDeveloper\AwpTheme\Skeleton
 * @author  abhishekWebDeveloper.com
 */

namespace abhishekWebDeveloper\AwpTheme\Skeleton;

use abhishekWebDeveloper\AwpTheme\Base;
use abhishekWebDeveloper\AwpTheme\Helpers\BootsOnceTrait;

defined( 'ABSPATH' ) || die();

/**
 * Header.
 */
final class Header {
	use BootsOnceTrait;

	/**
	 * Run boot tasks.
	 */
	protected static function on_boot(): void {
		add_action( 'awp_theme/skeleton/header', [ self::class, 'render' ] );
		add_action( 'awp_theme/skeleton/header/open', [ self::class, 'open' ] );
		add_action( 'awp_theme/skeleton/header/content', [ self::class, 'content' ] );
		add_action( 'awp_theme/skeleton/header/close', [ self::class, 'close' ] );
	}

	/**
	 * Render the region (fires its three slots).
	 */
	public static function render(): void {
		do_action( 'awp_theme/skeleton/header/open' );
		do_action( 'awp_theme/skeleton/header/content' );
		do_action( 'awp_theme/skeleton/header/close' );
	}

	/**
	 * Wrapper open.
	 */
	public static function open(): void {
		echo '<header class="awp-theme-header">';
	}

	/**
	 * Content slot.
	 */
	public static function content(): void {
		Base::view( 'core/views/header/content' );
	}

	/**
	 * Wrapper close.
	 */
	public static function close(): void {
		echo '</header>';
	}
}
