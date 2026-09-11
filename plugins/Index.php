<?php
/**
 * Plugins-root Index — initializes plugin Sectors.
 *
 * @package abhishekWebDeveloper\AwpTheme\Plugins
 * @author  abhishekWebDeveloper.com
 */

namespace abhishekWebDeveloper\AwpTheme\Plugins;

use abhishekWebDeveloper\AwpTheme\Helpers\BootsOnceTrait;

defined( 'ABSPATH' ) || die();

/**
 * Index.
 */
class Index {
	use BootsOnceTrait;

	/**
	 * Run boot tasks.
	 */
	protected static function on_boot(): void {
		// Woocommerce.
		Woocommerce\Index::boot();
	}
}
