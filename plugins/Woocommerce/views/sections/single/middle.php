<?php
/**
 * Middle section for the product single.
 *
 * @package abhishekWebDeveloper\AwpTheme
 * @author  abhishekWebDeveloper
 */

defined( 'ABSPATH' ) || die();
?>

<div class="awp-container awp-product__container flex flex-col gap-8 lg:gap-12 xl:flex-row xl:gap-15 2xl:gap-20">
	<div class="awp-product__main flex-1">Main</div>

	<aside class="awp-product__sidebar shrink-0 w-90 hidden lg:block">
		<div class="awp-product__sidebar-content sticky top-[calc(30px+var(--awp-admin-bar-height,0px))]">
			<div class="awp-product__inquiry">
				<h3 class="awp-product__inquiry-form-title text-3xl font-semibold text-white mb-6 lg:text-2xl 2xl:text-7xl">
					Inquire About <?php echo esc_html( get_the_title() ); ?>
				</h3>

				<div class="awp-product__inquiry-form p-5 border border-awp-grey-15 rounded-lg">
					<?php echo do_shortcode( '[ws_form id="1"]' ); ?>
				</div>
			</div>
		</div>
	</aside>
</div>
