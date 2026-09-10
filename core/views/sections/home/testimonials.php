<?php
/**
 * Testimonials section for the home page.
 *
 * @package abhishekWebDeveloper\AwpTheme
 * @author  abhishekWebDeveloper
 */

defined( 'ABSPATH' ) || die();

$reviews = [
	[
		'title'       => 'Exceptional Service!',
		'description' => "Our experience with Estatein was outstanding. Their team's dedication and professionalism made finding our dream home a breeze. Highly recommended!",
		'author'      => [
			[
				'image_id' => '52',
				'name'     => 'Wade Warren',
				'location' => 'USA, California',
			],
		],
	],
	[
		'title'       => 'Efficient and Reliable',
		'description' => "Estatein provided us with top-notch service. They helped us sell our property quickly and at a great price. We couldn't be happier with the results.",
		'author'      => [
			[
				'image_id' => '50',
				'name'     => 'Emelie Thomson',
				'location' => 'USA, Florida',
			],
		],
	],
	[
		'title'       => 'Trusted Advisors',
		'description' => 'The Estatein team guided us through the entire buying process. Their knowledge and commitment to our needs were impressive. Thank you for your support!',
		'author'      => [
			[
				'image_id' => '51',
				'name'     => 'John Mans',
				'location' => 'USA, Nevada',
			],
		],
	],
];

	// Do not proceed if there are no featured reviews.
if ( ! $reviews ) {
	return;
}
?>

<section class="
	awp-home-reviews mt-20
	lg:mt-30 2xl:mt-37
">
	<div class="
		awp-home-reviews__container relative awp-container pb-24
		lg:pb-0
	">
		<div class="
			awp-home-reviews__header flex justify-between gap-5
			lg:gap-30
			2xl:gap-50
		">
			<div class="awp-home-reviews__header-content">
				<h2 class="
					awp-home-reviews__title text-3xl font-semibold leading-tight text-white
					lg:text-5xl
					2xl:text-7xl
				">
					What Our Clients Say
				</h2>

				<p class="
					awp-home-reviews__subtitle mt-2 text-sm
					lg:text-base lg:mt-3
					2xl:text-lg 2xl:mt-4
				">
					Read the success stories and heartfelt testimonials from our valued clients. Discover why they chose Estatein for their real estate needs.
				</p>
			</div>

			<a
				class="
					awp-button awp-button--1 w-full inline-block absolute bottom-0 rounded-lg shrink-0 border border-awp-grey-15 bg-awp-grey-10 px-5 py-3.5 text-sm font-medium text-white text-center self-end
					lg:static lg:w-auto
					2xl:py-4.5 2xl:px-6 2xl:text-lg
				"
				href="<?php echo esc_url( get_the_permalink( 48 ) ); ?>"
			>
				View All Testimonials
			</a>
		</div>

		<div class="
			awp-home-reviews__list mt-10 grid grid-cols-1 gap-8
			lg:grid-cols-3 lg:mt-15 lg:gap-5
			2xl:mt-20 2xl:gap-8
		">
			<?php foreach ( $reviews as $review ) : ?>
				<div class="
					awp-home-reviews__card rounded-[12px] border border-awp-grey-15 bg-awp-grey-08
					p-7.5
					lg:p-10
					2xl:p-12.5
				">
					<img
						class="awp-home-review__icon w-auto h-7.5 lg:h-9 2xl:h-11"
						src="<?php echo esc_url( get_template_directory_uri() . '/core/src/img/icons/icon-5-star.svg' ); ?>"
						alt="Icon 5 star"
					>

					<h3 class="
						awp-home-reviews__card-title text-lg mt-6 text-white font-semibold
						lg:text-xl lg:mt-7.5
						2xl:text-2xl 2xl:mt-10
					">
						<?php echo esc_html( $review['title'] ); ?>
					</h3>

					<div class="
						awp-home-reviews__card-description mt-1.5 text-sm text-white text-pretty
						lg:text-base lg:mt-2.5
						2xl:text-lg 2xl:mt-3.5
					">
						<?php echo wp_kses_post( $review['description'] ); ?>
					</div>

					<div class="awp-home-reviews__author flex items-center gap-2.5 mt-6 lg:mt-7.5 lg:gap-3 2xl:mt-10">
						<?php foreach ( $review['author'] as $author ) : ?>
							<?php
							echo wp_get_attachment_image(
								$author['image_id'],
								'medium',
								false,
								[ 'class' => 'awp-home-reviews__author--img h-12 w-12 rounded-full object-cover 2xl:h-15 2xl:w-15' ],
							);
							?>

						<div class="awp-home-reviews__author-content">
							<p class="awp-home-reviews__author-name text-base text-white font-medium lg:text-lg 2xl:text-xl">
								<?php echo esc_html( $author['name'] ); ?>
							</p>

							<p class="awp-home-reviews__author-location text-base font-medium lg:text-lg 2xl:text-xl">
								<?php echo esc_html( $author['location'] ); ?>
							</p>
						</div>
						<?php endforeach; ?>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
