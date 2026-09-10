<?php
/**
 * Stats blocks.
 *
 * @package abhishekWebDeveloper\AwpTheme
 * @author  abhishekWebDeveloper
 */

defined( 'ABSPATH' ) || die();

$stats = [
	[
		'number' => '200+',
		'label'  => 'Happy Customers',
	],
	[
		'number' => '10k+',
		'label'  => 'Properties For Clients',
	],
	[
		'number' => '16+',
		'label'  => 'Years of Experience',
	],
];

// Do not proceed if there are no stats to display.
if ( ! $stats ) {
	return;
}
?>

<div class="
	awp-home-hero__stats mt-10 grid grid-cols-2 gap-3
	lg:mt-12 lg:grid-cols-3 lg:gap-4
	2xl:mt-15 2xl:gap-6
">
	<?php foreach ( $stats as $item ) : ?>
		<div class="
			awp-home-hero__stat-item rounded-lg border border-awp-grey-15 bg-awp-grey-10 text-center p-4 content-center last:col-span-full
			lg:last:col-span-1
		">
			<p class="
				awp-home-hero__stat-number text-2xl font-bold text-white
				lg:text-[40px]
			">
				<?php echo esc_html( $item['number'] ); ?>
			</p>

			<p class="
				awp-home-hero__stat-label mt-0.5 text-sm text-awp-grey-60
				lg:text-lg
			">
				<?php echo esc_html( $item['label'] ); ?>
			</p>
		</div>
	<?php endforeach; ?>
</div>
