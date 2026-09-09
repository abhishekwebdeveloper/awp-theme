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
						'container_class' => 'awp-primary-nav awp-nav-accordion',
						'depth'           => 3,
						'fallback_cb'     => false,
					],
				);
				?>
				</div>

				<div class="awp-theme-mobile-navigation__footer">
				</div>

			</div>
		</div>
	</div>
</div>
