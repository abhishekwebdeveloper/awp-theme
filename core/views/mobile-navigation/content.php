<?php
/**
 * Mobile navigation offcanvas shell.
 *
 * @package abhishekWebDeveloper\AwpTheme
 * @author  abhishekWebDeveloper
 */

use abhishekWebDeveloper\AwpTheme\Base;

defined( 'ABSPATH' ) || die();

$awp_logo_url = apply_filters( 'awp_theme/mobile_navigation/logo_url', Base::get_info( 'url' ) . 'assets/img/logo.svg' );
?>

<div
	class="awp-theme-mobile-navigation__offcanvas"
	x-data="{ open: false }"
	:data-open="open ? 'yes' : 'no'"
	@awp-open-dialog.window="open = $event.detail === 'mobile-navigation'"
	@keydown.escape.window="open = false"
>
	<div class="awp-theme-mobile-navigation__backdrop" @click="open = false"></div>

	<div
		class="awp-theme-mobile-navigation__main"
		role="dialog"
		aria-modal="true"
		aria-label="Mobile navigation"
	>
		<button
			class="awp-theme-mobile-navigation__close"
			aria-label="Close"
			@click="open = false"
		></button>

		<div class="awp-theme-mobile-navigation__container">
			<div class="awp-theme-mobile-navigation__content">
				<div class="awp-theme-mobile-navigation__body">
				<div class="awp-theme-mobile-navigation__header">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
						<img
							class="awp-theme-mobile-navigation__logo"
							src="<?php echo esc_url( $awp_logo_url ); ?>"
							alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>"
						>
					</a>
				</div>

				<?php
				wp_nav_menu(
					[
						'theme_location'  => 'primary',
						'container'       => 'nav',
						'container_class' => 'awp-primary-nav awp-nav-accordion px-5 py-10 text-white [&_li]:text-xl [&_li]:leading-tight',
						'menu_class'      => 'flex flex-col gap-5',
						'depth'           => 3,
						'fallback_cb'     => false,
					],
				);
				?>
				</div>

				<div class="awp-theme-mobile-navigation__footer px-5 py-8 bg-awp-grey-10">
					<h3 class="text-xl mb-5">Follow Us</h3>

					<div class="awp-theme-footnote__socials flex items-center gap-2">
						<a class="awp-theme-footnote__social-link shrink-0" href="#" aria-label="Facebook">
							<img
								class="awp-theme-footnote__social-icon h-12 w-12 lg:h-10 lg:w-10 2xl:h-13 2xl:w-13"
								src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/icons/facebook.svg' ); ?>"
								alt="Facebook
							">
						</a>

						<a class="awp-theme-footnote__social-link" href="#" aria-label="LinkedIn">
						<img
							class="awp-theme-footnote__social-icon h-12 w-12 lg:h-10 lg:w-10 2xl:h-13 2xl:w-13"
							src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/icons/linkedin.svg' ); ?>"
							alt="LinkedIn
						">
						</a>

						<a class="awp-theme-footnote__social-link" href="#" aria-label="Twitter">
						<img
							class="awp-theme-footnote__social-icon h-12 w-12 lg:h-10 lg:w-10 2xl:h-13 2xl:w-13"
							src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/icons/x-twitter.svg' ); ?>"
							alt="Twitter
						">
						</a>

						<a class="awp-theme-footnote__social-link" href="#" aria-label="YouTube">
						<img
							class="awp-theme-footnote__social-icon h-12 w-12 lg:h-10 lg:w-10 2xl:h-13 2xl:w-13"
							src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/icons/youtube.svg' ); ?>"
							alt="YouTube
						">
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
