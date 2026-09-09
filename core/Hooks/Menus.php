<?php
/**
 * Nav menu registration.
 *
 * @package abhishekWebDeveloper\AwpTheme\Hooks
 * @author  abhishekWebDeveloper.com
 */

namespace abhishekWebDeveloper\AwpTheme\Hooks;

use abhishekWebDeveloper\AwpTheme\Helpers\BootsOnceTrait;

defined( 'ABSPATH' ) || die();

/**
 * Menus.
 */
class Menus {
	use BootsOnceTrait;

	/**
	 * Run boot tasks.
	 */
	protected static function on_boot(): void {
		add_action( 'after_setup_theme', [ self::class, 'register_menus' ] );
	}

	/**
	 * Register nav menu locations.
	 */
	public static function register_menus(): void {
		register_nav_menus(
			[
				'footnote' => esc_html__( 'Footnote', 'awp-theme' ),
			]
		);
	}
}
