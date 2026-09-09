<?php
/**
 * Main asset enqueues.
 *
 * @package abhishekWebDeveloper\AwpTheme\HooksFrontend
 * @author  abhishekWebDeveloper.com
 */

namespace abhishekWebDeveloper\AwpTheme\HooksFrontend;

use abhishekWebDeveloper\AwpTheme\Base;
use abhishekWebDeveloper\AwpTheme\Helpers\BootsOnceTrait;

defined( 'ABSPATH' ) || die();

/**
 * Scripts.
 */
class Scripts {
	use BootsOnceTrait;

	/**
	 * Run boot tasks.
	 */
	protected static function on_boot(): void {
		// Enqueue vendor scripts.
		add_action( 'wp_enqueue_scripts', [ self::class, 'enqueue_vendor_scripts' ], 100 );

		// Enqueue main scripts.
		add_action( 'wp_enqueue_scripts', [ self::class, 'enqueue_main_scripts' ], 200 );

		// Enqueue WordPress scripts.
		add_action( 'wp_enqueue_scripts', [ self::class, 'enqueue_wp_scripts' ], 600 );
	}

		/**
		 * Enqueue vendor scripts.
		 */
	public static function enqueue_vendor_scripts(): void {
		// Google font: Urbanist.
		wp_enqueue_style(
			'google-font-urbanist',
			'https://fonts.googleapis.com/css2?family=Urbanist:ital,wght@0,100..900;1,100..900&display=swap',
			[],
			'1.0.0'
		);
	}

	/**
	 * Enqueue main scripts and styles built by Rollup.
	 */
	public static function enqueue_main_scripts(): void {
		$slug      = Base::get_info( 'slug' );
		$base_url  = Base::get_info( 'url' );
		$base_path = Base::get_info( 'path' );

		$css_relative = 'assets/core.css';
		$js_relative  = 'assets/core.js';

		$css_path = $base_path . $css_relative;
		$js_path  = $base_path . $js_relative;

		if ( file_exists( $css_path ) ) {
			wp_enqueue_style(
				$slug . '-core',
				$base_url . $css_relative,
				[],
				(string) filemtime( $css_path )
			);
		}

		if ( file_exists( $js_path ) ) {
			wp_enqueue_script(
				$slug . '-core',
				$base_url . $js_relative,
				[],
				(string) filemtime( $js_path ),
				[ 'in_footer' => true ]
			);
		}
	}

	/**
	 * Enqueue WordPress scripts.
	 */
	public static function enqueue_wp_scripts(): void {
		// Conditionally enqueue comment reply JS file.
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
	}
}
