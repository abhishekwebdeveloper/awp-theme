<?php
/**
 * Preface helpers.
 *
 * Static title resolvers for the Skeleton preface region. No hooks registered,
 * no bootstrap. The `awp_theme/preface/title` filter is the extension
 * point (the WooCommerce integration uses it to inject the shop title).
 *
 * @package abhishekWebDeveloper\AwpTheme\Helpers
 * @author  abhishekWebDeveloper.com
 */

namespace abhishekWebDeveloper\AwpTheme\Helpers;

defined( 'ABSPATH' ) || die();

/**
 * Preface helpers.
 */
class Preface {
	/**
	 * Resolve the title to render in the preface region.
	 *
	 * @return string
	 */
	public static function get_title(): string {
		$text = '';

		if (
			is_home() ||
			is_singular( 'post' ) ||
			is_category() ||
			is_tag()
		) {
			$text = self::get_blog_title();

		} elseif ( is_singular( 'page' ) ) {
			$text = get_the_title();

		} elseif ( is_singular() ) {
			$post_type = get_queried_object()->post_type;
			$text      = get_post_type_object( $post_type )->label;

		} elseif ( is_post_type_archive() ) {
			$text = get_queried_object()->labels->name;

		} else {
			$text = get_the_title();
		}

		$text = $text ?: get_the_title();

		return apply_filters( 'awp_theme/preface/title', $text );
	}

	/**
	 * Resolve the title for the blog/posts page.
	 *
	 * @return string
	 */
	public static function get_blog_title(): string {
		$text    = __( 'Blog', 'awp-theme' );
		$page_id = get_option( 'page_for_posts' );

		if ( 'page' === get_option( 'show_on_front' ) && $page_id ) {
			$text = get_the_title( get_option( 'page_for_posts' ) );
		}

		return $text;
	}
}
