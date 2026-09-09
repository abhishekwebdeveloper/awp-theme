<?php
/**
 * Preface content. Outputs the page title.
 *
 * @package abhishekWebDeveloper\AwpTheme
 * @author  abhishekWebDeveloper.com
 */

namespace abhishekWebDeveloper\AwpTheme;

use abhishekWebDeveloper\AwpTheme\Helpers\Preface;

defined( 'ABSPATH' ) || die();

if ( ! Preface::get_title() ) {
	return;
}
?>

<h1 class="awp-theme-preface__title">
	<?php echo esc_html( Preface::get_title() ); ?>
</h1>
