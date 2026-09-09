<?php
/**
 * Main region.
 *
 * @package abhishekWebDeveloper\AwpTheme\Skeleton
 * @author  abhishekWebDeveloper.com
 */

namespace abhishekWebDeveloper\AwpTheme\Skeleton;

use abhishekWebDeveloper\AwpTheme\Base;
use abhishekWebDeveloper\AwpTheme\Helpers\BootsOnceTrait;

defined( 'ABSPATH' ) || die();

/**
 * Main.
 */
final class Main {
	use BootsOnceTrait;

	/**
	 * Run boot tasks.
	 */
	protected static function on_boot(): void {
		add_action( 'awp_theme/skeleton/main', [ self::class, 'render' ] );
		add_action( 'awp_theme/skeleton/main/open', [ self::class, 'open' ] );
		add_action( 'awp_theme/skeleton/main/content', [ self::class, 'content' ] );
		add_action( 'awp_theme/skeleton/main/close', [ self::class, 'close' ] );
	}

	/**
	 * Render the region.
	 */
	public static function render(): void {
		do_action( 'awp_theme/skeleton/main/open' );
		do_action( 'awp_theme/skeleton/main/content' );
		do_action( 'awp_theme/skeleton/main/close' );
	}

	/**
	 * Wrapper open.
	 */
	public static function open(): void {
		echo '<main class="awp-theme-main">';
	}

	/**
	 * Content slot.
	 */
	public static function content(): void {
		Base::view( 'core/views/main/content' );
	}

	/**
	 * Wrapper close.
	 */
	public static function close(): void {
		echo '</main>';
	}
}
