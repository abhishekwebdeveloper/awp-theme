<?php
/**
 * Hero section for the home page.
 *
 * @package abhishekWebDeveloper\AwpTheme
 * @author  abhishekWebDeveloper
 */

use abhishekWebDeveloper\AwpTheme\Base;

defined( 'ABSPATH' ) || die();
?>

<section class="awp-home-hero">
	<div class="awp-home-hero__container px-(--awp-container-gap) pt-10 lg:flex lg:px-0 lg:pt-0">
		<div class="
			awp-home-hero__image pb-8
			lg:mb-0 lg:pb-0 lg:shrink-0 lg:order-last
		">
			<?php
			echo wp_get_attachment_image(
				41,
				'large',
				false,
				[ 'class' => 'awp-home-hero__image--img rounded-xl aspect-358/302 w-full object-cover lg:rounded-none lg:aspect-690/622 lg:w-[690px] 2xl:aspect-920/814 2xl:w-[920px]' ],
			);
			?>
		</div>

		<div class="awp-home-hero__content lg:flex-1 lg:self-center lg:pl-20 lg:pr-15 2xl:pl-40 2xl:pr-20">
			<h1 class="
				awp-home-hero__title text-3xl font-semibold leading-tight text-balance
				lg:text-7xl
				2xl:text-9xl
			">
				Discover Your Dream Property with Estatein
			</h1>

			<p class="
				awp-home-hero__subtitle text-sm font-medium text-awp-grey-60 mt-4 text-pretty
				lg:mt-5 lg:text-base
				2xl:mt-6 2xl:text-lg
			">
				Your journey to finding the perfect property begins here. Explore our listings to find the home that matches your dreams.
			</p>

			<div class="
				awp-home-hero__button-group flex flex-wrap flex-col items-center gap-4 mt-10
				lg:mt-12 lg:items-start lg:flex-row
				2xl:mt-15 2xl:gap-5
			">
				<a
					class="
						awp-button awp-button--1 rounded-xl border border-awp-grey-15 px-5 py-3.5 text-sm font-medium text-white w-full text-center
						lg:w-auto
						2xl:py-4.5 2xl:px-6 2xl:text-lg
					"
					href="<?php echo esc_url( get_the_permalink( 24 ) ); ?>"
				>
					Learn More
				</a>

				<a
					class="
						awp-button awp-button--2 rounded-lg bg-awp-purple-60 px-5 py-3.5 text-sm font-medium text-white w-full text-center
						lg:w-auto
						2xl:py-4.5 2xl:px-6 2xl:text-lg
					"
					href="<?php echo esc_url( get_the_permalink( 26 ) ); ?>"
				>
					Browse Properties
				</a>
			</div>

			<?php Base::view( 'core/views/sections/home/blocks/stats' ); ?>
		</div>
	</div>
</section>
