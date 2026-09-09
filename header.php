<?php
/**
 * Header template.
 *
 * @package abhishekWebDeveloper\AwpTheme
 * @author  abhishekWebDeveloper.com
 */

namespace abhishekWebDeveloper\AwpTheme;

defined( 'ABSPATH' ) || die();
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php
wp_body_open();

do_action( 'awp_theme/skeleton/site/open' );
do_action( 'awp_theme/skeleton/header' );
do_action( 'awp_theme/skeleton/sticky_header' );
do_action( 'awp_theme/skeleton/preface' );
