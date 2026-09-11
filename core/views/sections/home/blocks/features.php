<?php
/**
 * Features blocks.
 *
 * @package abhishekWebDeveloper\AwpTheme
 * @author  abhishekWebDeveloper
 */

defined( 'ABSPATH' ) || die();

$features = [
	[
		'icon_classes' => 'mask-image-home',
		'title'        => 'Find Your Dream Home',
	],
	[
		'icon_classes' => 'mask-image-property-value',
		'title'        => 'Unlock Property Value',
	],
	[
		'icon_classes' => 'mask-image-property',
		'title'        => 'Effortless Property Management',
	],
	[
		'icon_classes' => 'mask-image-investment',
		'title'        => 'Smart Investments, Informed Decisions',
	],
];

// Do not proceed if there are no features.
if ( ! $features ) {
	return;
}
?>

<div class="awp-home-hero__features mt-10 lg:mt-0">
	<div class="
		awp-home-hero__features-container awp-container grid grid-cols-2 gap-2.5 border border-awp-grey-15 bg-awp-grey-08 rounded-xl p-2.5
		lg:rounded-none lg:grid-cols-4 lg:[--awp-container-width:100%] lg:[--awp-container-gap:0px]
		2xl:gap-5 2xl:p-5
	">
		<?php foreach ( $features as $feature ) : ?>
			<div class="
				awp-home-hero__feature-item content-center rounded-lg border border-awp-grey-15 bg-awp-grey-10 px-5 py-3.5 text-center
				lg:py-7 lg:px-4
				2xl:py-10 2xl:px-5
			">
				<i
					class="
						awp-home-hero__feature-icon <?php echo esc_attr( $feature['icon_classes'] ); ?> mask-image-sidekick
						before:mx-auto before:bg-awp-purple-75 before:w-12 before:h-12
						lg:before:w-15 lg:before:h-15
						2xl:before:w-20 2xl:before:h-20
					"
					aria-hidden="true"
				>
				</i>

				<p class="
					awp-home-hero__feature-title mt-3.5 text-sm text-white font-semibold
					lg:text-base lg:mt-4
					2xl:text-xl 2xl:mt-5
				">
					<?php echo esc_html( $feature['title'] ); ?>
				</p>
			</div>
		<?php endforeach; ?>
	</div>
</div>
