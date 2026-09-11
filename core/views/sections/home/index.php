<?php
/**
 * Sections for the home page.
 *
 * @package abhishekWebDeveloper\AwpTheme
 * @author  abhishekWebDeveloper
 */

use abhishekWebDeveloper\AwpTheme\Base;

defined( 'ABSPATH' ) || die();

Base::view( 'core/views/sections/home/hero' );
Base::view( 'core/views/sections/home/featured-properties' );
Base::view( 'core/views/sections/home/testimonials' );
Base::view( 'core/views/sections/home/faq' );
