<?php
/**
 * Site region. Outermost page wrapper.
 *
 * Unlike the other regions, it has no `render` orchestrator; `header.php` and
 * `footer.php` fire it directly.
 *
 * @package abhishekWebDeveloper\AwpTheme\Skeleton
 * @author  abhishekWebDeveloper.com
 */

namespace abhishekWebDeveloper\AwpTheme\Skeleton;

use abhishekWebDeveloper\AwpTheme\Helpers\BootsOnceTrait;

defined( 'ABSPATH' ) || die();

/**
 * Site.
 */
final class Site {
	use BootsOnceTrait;

	/**
	 * Run boot tasks.
	 */
	protected static function on_boot(): void {
		add_action( 'awp_theme/skeleton/site/open', [ self::class, 'open' ] );
		add_action( 'awp_theme/skeleton/site/close', [ self::class, 'close' ] );
	}

	/**
	 * Wrapper open.
	 */
	public static function open(): void {
		echo '<div class="awp-theme-site">';
	}

	/**
	 * Wrapper close.
	 */
	public static function close(): void {
		echo '</div>';
	}
}
