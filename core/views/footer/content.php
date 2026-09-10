<?php
/**
 * Footer content.
 *
 * @package abhishekWebDeveloper\AwpTheme
 * @author  abhishekWebDeveloper.com
 */

use abhishekWebDeveloper\AwpTheme\Base;

defined( 'ABSPATH' ) || die();
?>

<div class="awp-theme-footer-cta border-y border-awp-grey-15 mt-20 relative lg:mt-24">
	<img class="awp-theme-footer-cta__bg absolute inset-0 h-full w-full pointer-none -z-1 object-bottom-right object-cover" src="<?php echo esc_url( get_template_directory_uri() . '/core/src/img/cta-bg.png' ); ?>" alt="">

	<div class="awp-theme-footer-cta__container awp-container flex flex-col items-start gap-10  py-16 lg:flex-row lg:items-center lg:justify-between lg:py-24">
		<div class="awp-theme-footer-cta__text max-w-2xl">
			<h2 class="awp-theme-footer-cta__title text-3xl font-semibold leading-tight lg:text-7xl">
				Start Your Real Estate Journey Today
			</h2>

			<p class="awp-theme-footer-cta__subtitle mt-3 text-base leading-normal lg:text-lg">
				Your dream property is just a click away. Whether you're looking for a new home, a strategic investment, or expert real estate advice, Estatein is here to assist you every step of the way. Take the first step towards your real estate goals and explore our available properties or get in touch with our team for personalized assistance.
			</p>
		</div>

		<a
			class="
			awp-button awp-button--2 rounded-lg bg-awp-purple-60 px-5 py-3.5 text-sm font-medium text-white text-center
			2xl:py-4.5 2xl:px-6 2xl:text-lg
		"
		href="<?php echo esc_url( get_the_permalink( 26 ) ); ?>"
		>
		Explore Properties
		</a>
	</div>
</div>

<footer class="awp-theme-footer-footer">
	<div class="awp-container">
		<div class="awp-theme-footer-footer__top flex flex-col gap-16 py-16 lg:flex-row lg:py-20">
			<div class="awp-theme-footer-footer__brand flex flex-col gap-5 lg:w-105 lg:shrink-0 lg:gap-6">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
					<img
						class="awp-theme-footer-footer__logo h-8 w-auto"
						src="<?php echo esc_url( get_template_directory_uri() . '/core/src/img/logo.svg' ); ?>"
						alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>"
					>
				</a>

				<form class="awp-theme-footer-footer__newsletter flex items-center gap-3 rounded-xl border border-awp-grey-15 bg-awp-grey-08 px-6 py-3.5">
					<input class="awp-theme-footer-footer__newsletter-input flex-1 bg-transparent text-lg text-awp-grey-60 outline-none placeholder:text-awp-grey-60" type="email" placeholder="Enter Your Email" />

					<button class="awp-theme-footer-footer__newsletter-submit" type="submit" aria-label="Subscribe">
						submit
					</button>
				</form>
			</div>

			<div class="awp-theme-footer-footer__columns grid flex-1 grid-cols-2 gap-10 lg:grid-cols-3">
				<div class="awp-theme-footer-footer__column flex flex-col gap-6">
					<p class="awp-theme-footer-footer__column-title text-lg text-awp-grey-60">Quick links</p>

					<div class="awp-theme-footer-footer__column-links flex flex-col gap-4 text-base text-white lg:text-lg 2xl:text-xl">
						<a class="awp-theme-footer-footer__column-link" href="#">About Us</a>
						<a class="awp-theme-footer-footer__column-link" href="#">Properties</a>
						<a class="awp-theme-footer-footer__column-link" href="#">FAQs</a>
						<a class="awp-theme-footer-footer__column-link" href="#">Testimonials</a>
					</div>
				</div>

				<div class="awp-theme-footer-footer__column flex flex-col gap-6">
					<p class="awp-theme-footer-footer__column-title text-lg text-awp-grey-60">Properties</p>

					<div class="awp-theme-footer-footer__column-links flex flex-col gap-4 text-base text-white lg:text-lg 2xl:text-xl">
						<a class="awp-theme-footer-footer__column-link" href="#">Portfolio</a>
						<a class="awp-theme-footer-footer__column-link" href="#">Categories</a>
					</div>
				</div>

				<div class="awp-theme-footer-footer__column flex flex-col gap-6">
					<p class="awp-theme-footer-footer__column-title text-lg text-awp-grey-60">Services</p>

					<div class="awp-theme-footer-footer__column-links flex flex-col gap-4 text-base text-white lg:text-lg 2xl:text-xl">
						<a class="awp-theme-footer-footer__column-link" href="#">Valuation Mastery</a>
						<a class="awp-theme-footer-footer__column-link" href="#">Strategic Marketing</a>
						<a class="awp-theme-footer-footer__column-link" href="#">Negotiation Wizardry</a>
						<a class="awp-theme-footer-footer__column-link" href="#">Closing Success</a>
						<a class="awp-theme-footer-footer__column-link" href="#">Property Management</a>
					</div>
				</div>
			</div>
		</div>
	</div>

	<?php Base::view( 'core/views/footer/footnote' ); ?>
</footer>
