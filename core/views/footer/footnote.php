<?php
/**
 * Footnote content.
 *
 * @package abhishekWebDeveloper\AwpTheme
 * @author  abhishekWebDeveloper.com
 */

defined( 'ABSPATH' ) || die();
?>

<div class="awp-theme-footnote bg-awp-grey-10 py-4">
	<div class="awp-container flex flex-col items-center gap-4  lg:flex-row md:justify-between">
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

		<div class="awp-theme-footnote__links flex flex-wrap justify-center items-center gap-6 text-sm text-white lg:text-base lg:justify-start lg:-order-1">
			<p class="awp-copyright">
				&copy; <?php echo esc_html( gmdate( 'Y' ) ); ?>
				Estatein. All Rights Reserved.
			</p>

			<?php
			wp_nav_menu(
				[
					'theme_location'  => 'footnote',
					'container'       => 'nav',
					'container_class' => '
						awp-footnote__nav [&_ul]:flex [&_ul]:flex-col [&_ul]:gap-4
						xl:[&_ul]:flex-row xl:gap-5
					',
					'depth'           => 1,
					'fallback_cb'     => false,
				],
			);
			?>
		</div>
	</div>
</div>
