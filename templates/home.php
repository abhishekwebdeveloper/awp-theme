<?php
/**
 * Template Name: Home
 *
 * @package abhishekWebDeveloper\AwpTheme
 * @author  abhishekWebDeveloper
 */

namespace abhishekWebDeveloper\AwpTheme;

defined( 'ABSPATH' ) || die();

get_header();

Base::view( 'core/views/sections/home/index' );

get_footer();
