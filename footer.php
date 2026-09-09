<?php
/**
 * Footer template.
 *
 * @package abhishekWebDeveloper\AwpTheme
 * @author  abhishekWebDeveloper.com
 */

namespace abhishekWebDeveloper\AwpTheme;

defined( 'ABSPATH' ) || die();

do_action( 'awp_theme/skeleton/footer' );
do_action( 'awp_theme/skeleton/sticky_footer' );
do_action( 'awp_theme/skeleton/mobile_navigation' );
do_action( 'awp_theme/skeleton/site/close' );

wp_footer();
?>
</body>
</html>
