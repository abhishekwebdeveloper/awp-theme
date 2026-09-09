<?php
/**
 * Theme support declarations.
 *
 * @package abhishekWebDeveloper\AwpTheme\Hooks
 * @author  abhishekWebDeveloper.com
 */

namespace abhishekWebDeveloper\AwpTheme\Hooks;

use abhishekWebDeveloper\AwpTheme\Helpers\BootsOnceTrait;

defined( 'ABSPATH' ) || die();

/**
 * Theme support.
 */
class ThemeSupport {
	use BootsOnceTrait;

	/**
	 * Run boot tasks.
	 */
	protected static function on_boot(): void {
		add_action( 'after_setup_theme', [ self::class, 'add_theme_support' ] );
		add_action( 'after_setup_theme', [ self::class, 'set_content_width' ] );
	}

	/**
	 * Declare WordPress theme support flags.
	 */
	public static function add_theme_support(): void {
		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		// Let WordPress manage the document title.
		add_theme_support( 'title-tag' );

		// Switch default core markup to output valid HTML5.
		add_theme_support(
			'html5',
			[
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
			],
		);

		// Enable support for Post Thumbnails on posts and pages.
		add_theme_support( 'post-thumbnails' );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );
	}

	/**
	 * Set the content width in pixels, based on the theme's design.
	 */
	public static function set_content_width(): void {
		$GLOBALS['content_width'] = apply_filters( 'awp_theme/content_width', 1400 );
	}
}
