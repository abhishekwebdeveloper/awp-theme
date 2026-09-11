<?php
/**
 * FAQ section for the home page.
 *
 * @package abhishekWebDeveloper\AwpTheme
 * @author  abhishekWebDeveloper
 */

defined( 'ABSPATH' ) || die();

$faqs = [
	[
		'title'       => 'How do I search for faq on Estatein?',
		'description' => 'Learn how to use our user-friendly search tools to find faq that match your criteria.',
	],
	[
		'title'       => 'What documents do I need to sell my faq through Estatein?',
		'description' => 'Learn how to use our user-friendly search tools to find faq that match your criteria.',
	],
	[
		'title'       => 'How can I contact an Estatein agent?',
		'description' => 'Discover the different ways you can get in touch with our experienced agents.',
	],
	[
		'title'       => 'How can I contact an Estatein agent?',
		'description' => 'Discover the different ways you can get in touch with our experienced agents.',
	],

	[
		'title'       => 'How can I contact an Estatein agent?',
		'description' => 'Discover the different ways you can get in touch with our experienced agents.',
	],

	[
		'title'       => 'How can I contact an Estatein agent?',
		'description' => 'Discover the different ways you can get in touch with our experienced agents.',
	],

	[
		'title'       => 'How can I contact an Estatein agent?',
		'description' => 'Discover the different ways you can get in touch with our experienced agents.',
	],
];

// Do not proceed if there are no faqs.
if ( ! $faqs ) {
	return;
}
?>

<section class="
	awp-home-faq mt-20
	lg:mt-30 2xl:mt-37
">
	<div class="
		awp-home-faq__container relative awp-container
		lg:pb-0
	">
		<div class="
			awp-home-faq__header flex justify-between gap-5
			lg:gap-30
			2xl:gap-50
		">
			<div class="awp-home-faq__header-content">
				<h2 class="
					awp-home-faq__title text-3xl font-semibold leading-tight text-white
					lg:text-5xl
					2xl:text-7xl
				">
					Frequently Asked Questions
				</h2>

				<p class="
					awp-home-faq__subtitle mt-2 text-sm
					lg:text-base lg:mt-3
					2xl:text-lg 2xl:mt-4
				">
					Find answers to common questions about Estatein's services, faq listings, and the real estate process. We're here to provide clarity and assist you every step of the way.
				</p>
			</div>

			<a
				class="
					awp-button awp-button--1 inline-block z-30 mt-2 absolute bottom-0 rounded-lg shrink-0 border border-awp-grey-15 bg-awp-grey-10 px-5 py-3.5 text-sm font-medium text-white text-center self-end
					lg:static
					2xl:py-4.5 2xl:px-6 2xl:text-lg
				"
				href="<?php echo esc_url( get_the_permalink( 45 ) ); ?>"
			>
				View All FAQ’s
			</a>
		</div>

		<div
			class="
				awp-home-faq__list swiper mt-10 grid grid-cols-1 gap-8
				lg:grid-cols-3 lg:mt-15 lg:gap-5
				2xl:mt-20 2xl:gap-8
			"
			data-awp-card-slider
		>
			<div class="swiper-wrapper">
				<?php foreach ( $faqs as $faq ) : ?>
					<div class="
						awp-home-faq__card swiper-slide rounded-[12px] border border-awp-grey-15 bg-awp-grey-08
						p-7.5
						lg:p-10
						2xl:p-12.5
					">
						<a href="#" class="awp-home-faq__link">
							<h3 class="
								awp-home-faq__card-title text-lg text-white font-semibold
								lg:text-xl
								2xl:text-2xl
							">
								<?php echo esc_html( $faq['title'] ); ?>
							</h3>
						</a>

						<div class="
							awp-home-faq__card-description mt-5 text-sm
							lg:text-base lg:mt-6
							2xl:text-lg 2xl:mt-7.5
						">
							<?php echo wp_kses_post( $faq['description'] ); ?>
						</div>

						<a
							class="
								awp-button awp-button--1 block rounded-lg mt-5 shrink-0 border border-awp-grey-15 bg-awp-grey-10 px-5 py-3.5 text-sm font-medium text-white text-center
								lg:mt-6 lg:w-fit
								2xl:py-4.5 2xl:px-6 2xl:text-lg 2xl:mt-7.5
							"
							href="#"
						>
							Read More
						</a>
					</div>
				<?php endforeach; ?>
			</div>

			<div class="awp-home-faq__bottom border-t border-awp-grey-15 pt-4 mt-7.5 flex items-center justify-end gap-2.5 [&_svg]:h-5! [&_svg]:w-5!">
				<div class="swiper-button-prev static! m-0! rounded-full border border-awp-grey-15 text-white! lg:ml-auto!"></div>
				<div class="swiper-pagination static! m-0! w-auto! text-white! lg:-order-1"></div>
				<div class="swiper-button-next static! m-0! rounded-full border border-awp-grey-15 text-white!"></div>
			</div>
		</div>
	</div>
</section>
