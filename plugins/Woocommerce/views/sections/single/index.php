<?php
/**
 * Sections for the product single.
 *
 * @package abhishekWebDeveloper\AwpTheme
 * @author  abhishekWebDeveloper
 */

use abhishekWebDeveloper\AwpTheme\Base;

defined( 'ABSPATH' ) || die();

Base::view( 'plugins/woocommerce/views/sections/single/hero' );
Base::view( 'plugins/woocommerce/views/sections/single/middle' );
Base::view( 'core/views/sections/home/faq' );
