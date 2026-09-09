<?php
/**
 * Main content. Runs the WordPress loop.
 *
 * @package abhishekWebDeveloper\AwpTheme
 * @author  abhishekWebDeveloper.com
 */

defined( 'ABSPATH' ) || die();

if ( have_posts() ) {
	while ( have_posts() ) {
		the_post();
		the_content();
	}
}
