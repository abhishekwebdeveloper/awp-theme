<?php
/**
 * Header content.
 *
 * @package abhishekWebDeveloper\AwpTheme
 * @author  abhishekWebDeveloper.com
 */

use abhishekWebDeveloper\AwpTheme\Base;

defined( 'ABSPATH' ) || die();

$awp_logo_url = apply_filters( 'awp_theme/logo_url', Base::get_info( 'url' ) . 'assets/img/logo.svg' );
?>

<nav class="
	awp-theme-header__content px-4 py-5 bg-awp-grey-10 flex gap-5 items-center justify-between
	xl:px-20 xl:py-3.5
	2xl:px-40 2xl:py-5
">
	<a
		class="awp-theme-header__logo-link shrink-0"
		href="<?php echo esc_url( home_url( '/' ) ); ?>"
		rel="home"
	>
		<img
			class="
				awp-theme-header__logo w-auto h-7
				xl:h-8.5
				2xl:h-12
			"
			src="<?php echo esc_url( $awp_logo_url ); ?>"
			alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>"
		>
	</a>

	<?php
	wp_nav_menu(
		[
			'theme_location' => 'primary',
			'menu_class'     => '
				awp-theme-header__primary-menu flex gap-6 items-center hidden lg:flex
				[&_li]:text-white [&_li]:text-sm [&_li]:font-medium [&_li]:leading-normal
				2xl:gap-8 2xl:[&_li]:text-lg
			',
			'container'      => false,
			'depth'          => 3,
			'fallback_cb'    => false,
		],
	);
	?>

	<a
		class="
			awp-theme-header__cta-button shrink-0 hidden bg-awp-grey-08 border border-awp-grey-15 rounded-lg px-5 py-3.5 text-sm font-medium text-white
			lg:inline-block
			2xl:px-6 2xl:py-4 2xl:text-lg
		"
		href="<?php echo esc_url( home_url( '/contact' ) ); ?>"
	>
		Contact Us
	</a>

	<div class="
		awp-theme-header__hamburger mask-image-hamburger mask-image-sidekick
		before:w-7 before:h-7 before:bg-white
		lg:hidden
	"
	x-data
				@click="$dispatch('awp-open-dialog', 'mobile-navigation')"
	>
		<span class="sr-only">Menu</span>
	</div>
</nav>
