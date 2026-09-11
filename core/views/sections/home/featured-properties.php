<?php
/**
 * Featured properties section for the home page.
 *
 * @package abhishekWebDeveloper\AwpTheme
 * @author  abhishekWebDeveloper
 */

defined( 'ABSPATH' ) || die();

$featured_properties = [
	[
		'image_id'    => '44',
		'title'       => 'Seaside Serenity Villa',
		'description' => 'A stunning 4-bedroom, 3-bathroom villa in a peaceful suburban neighborhood.',
		'tags'        => [
			[
				'icon_classes' => 'mask-image-bedroom',
				'title'        => '4-Bedroom',
			],
			[
				'icon_classes' => 'mask-image-bathroom',
				'title'        => '3-Bathroom',
			],
			[
				'icon_classes' => 'mask-image-villa',
				'title'        => 'Villa',
			],
		],
		'price'       => '$550,000',
	],
	[
		'image_id'    => '42',
		'title'       => 'Metropolitan Haven',
		'description' => 'A chic and fully-furnished 2-bedroom apartment with panoramic city views',
		'tags'        => [
			[
				'icon_classes' => 'mask-image-bedroom',
				'title'        => '2-Bedroom',
			],
			[
				'icon_classes' => 'mask-image-bathroom',
				'title'        => '2-Bathroom',
			],
			[
				'icon_classes' => 'mask-image-villa',
				'title'        => 'Villa',
			],
		],
		'price'       => '$570,000',
	],
	[
		'image_id'    => '43',
		'title'       => 'Rustic Retreat Cottage',
		'description' => 'An elegant 3-bedroom, 2.5-bathroom townhouse in a gated community',
		'tags'        => [
			[
				'icon_classes' => 'mask-image-bedroom',
				'title'        => '3-Bedroom',
			],
			[
				'icon_classes' => 'mask-image-bathroom',
				'title'        => '3-Bathroom',
			],
			[
				'icon_classes' => 'mask-image-villa',
				'title'        => 'Villa',
			],
		],
		'price'       => '$520,000',
	],
	[
		'image_id'    => '43',
		'title'       => 'Rustic Retreat Cottage',
		'description' => 'An elegant 3-bedroom, 2.5-bathroom townhouse in a gated community',
		'tags'        => [
			[
				'icon_classes' => 'mask-image-bedroom',
				'title'        => '3-Bedroom',
			],
			[
				'icon_classes' => 'mask-image-bathroom',
				'title'        => '3-Bathroom',
			],
			[
				'icon_classes' => 'mask-image-villa',
				'title'        => 'Villa',
			],
		],
		'price'       => '$520,000',
	],
	[
		'image_id'    => '43',
		'title'       => 'Rustic Retreat Cottage',
		'description' => 'An elegant 3-bedroom, 2.5-bathroom townhouse in a gated community',
		'tags'        => [
			[
				'icon_classes' => 'mask-image-bedroom',
				'title'        => '3-Bedroom',
			],
			[
				'icon_classes' => 'mask-image-bathroom',
				'title'        => '3-Bathroom',
			],
			[
				'icon_classes' => 'mask-image-villa',
				'title'        => 'Villa',
			],
		],
		'price'       => '$520,000',
	],
	[
		'image_id'    => '43',
		'title'       => 'Rustic Retreat Cottage',
		'description' => 'An elegant 3-bedroom, 2.5-bathroom townhouse in a gated community',
		'tags'        => [
			[
				'icon_classes' => 'mask-image-bedroom',
				'title'        => '3-Bedroom',
			],
			[
				'icon_classes' => 'mask-image-bathroom',
				'title'        => '3-Bathroom',
			],
			[
				'icon_classes' => 'mask-image-villa',
				'title'        => 'Villa',
			],
		],
		'price'       => '$520,000',
	],
];

// Do not proceed if there are no featured properties.
if ( ! $featured_properties ) {
	return;
}
?>

<section class="
	awp-home-properties mt-20
	lg:mt-30 2xl:mt-37
">
	<div class="
		awp-home-properties__container relative awp-container
		lg:pb-0
	">
		<div class="
			awp-home-properties__header flex justify-between gap-5
			lg:gap-30
			2xl:gap-50
		">
			<div class="awp-home-properties__header-content">
				<h2 class="
					awp-home-properties__title text-3xl font-semibold leading-tight text-white
					lg:text-5xl
					2xl:text-7xl
				">
					Featured Properties
				</h2>

				<p class="
					awp-home-properties__subtitle mt-2 text-sm
					lg:text-base lg:mt-3
					2xl:text-lg 2xl:mt-4
				">
					Explore our handpicked selection of featured properties. Each listing offers a glimpse into exceptional homes and investments available through Estatein. Click "View Details" for more information.
				</p>
			</div>

			<a
				class="
					awp-button awp-button--1 z-30 mt-2 inline-block absolute bottom-0 rounded-lg shrink-0 border border-awp-grey-15 bg-awp-grey-10 px-5 py-3.5 text-sm font-medium text-white text-center self-end
					lg:static
					2xl:py-4.5 2xl:px-6 2xl:text-lg
				"
				href="<?php echo esc_url( get_the_permalink( 26 ) ); ?>"
			>
				View All Properties
			</a>
		</div>

		<div
			class="
				awp-home-properties__list swiper mt-10 grid grid-cols-1 gap-8
				lg:grid-cols-3 lg:mt-15 lg:gap-5
				2xl:mt-20 2xl:gap-8
			"
			data-awp-card-slider
		>
			<div class="swiper-wrapper">
				<?php foreach ( $featured_properties as $property ) : ?>
					<article class="
						awp-home-properties__card swiper-slide rounded-[12px] border border-awp-grey-15 bg-awp-grey-08
						p-6
						lg:p-7
						2xl:p-9
					">
						<a href="#" class="awp-home-properties__link">
							<figure class="awp-home-properties__feature-image rounded-xl overflow-hidden">
								<?php
								echo wp_get_attachment_image(
									$property['image_id'],
									'large',
									false,
									[ 'class' => 'awp-home-properties__feature-image--img aspect-3/2 w-full object-cover' ],
								);
								?>
							</figure>
						</a>

						<div class="
							awp-home-properties__card-content mt-4
							lg:mt-5
							2xl:mt-6
						">
							<div class="awp-home-properties__card-header">
								<a href="#" class="awp-home-properties__link">
									<h3 class="
										awp-home-properties__card-title text-lg text-white font-semibold
										lg:text-xl
										2xl:text-2xl
									">
										<?php echo esc_html( $property['title'] ); ?>
									</h3>
								</a>

								<div class="
									awp-home-properties__card-description mt-1 text-sm
									lg:text-base
									2xl:text-lg
								">
									<?php echo wp_kses_post( $property['description'] ); ?>
								</div>
							</div>

							<div class="
								awp-home-properties__card-tags flex flex-wrap gap-1.5 mt-5
								lg:mt-6
								2xl:mt-7
							">
								<?php foreach ( $property['tags'] as $tags ) : ?>
									<span class="
										awp-home-properties__card-tag mask-image-sidekick <?php echo esc_attr( $tags['icon_classes'] ); ?>
										rounded-full border flex gap-2 items-center border-awp-grey-15 bg-awp-grey-10 px-3.5 py-1.5 text-sm text-white
										before:h-5 before:w-5 before:shrink-0 before:bg-current
										2xl:text-lg 2xl:before:h-6 2xl:before:w-6 2xl:py-2
									">
										<?php echo esc_html( $tags['title'] ); ?>
									</span>
								<?php endforeach; ?>
							</div>

							<div class="
								awp-home-properties__card-footer flex items-center justify-between gap-5 mt-5
								lg:mt-6
								2xl:mt-7
							">
								<div class="awp-home-properties__card-price-group">
									<p class="
										awp-home-properties__card-price-label text-sm
										2xl:text-lg
									">
										Price
									</p>

									<p class="
										awp-home-properties__card-price mt-0.5 text-lg font-semibold text-white
										lg:text-xl 2xl:text-2xl
									">
										<?php echo esc_html( $property['price'] ); ?>
									</p>
								</div>

								<a
									class="
										awp-button awp-button--2 rounded-lg bg-awp-purple-60 px-5 py-3.5 text-sm font-medium text-white w-full text-center
										lg:w-auto
										2xl:py-4.5 2xl:px-6 2xl:text-lg
									"
									href="#"
								>
									View Property Details
								</a>
							</div>
						</div>
					</article>
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
