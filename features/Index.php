<?php
/**
 * Features-root Index — initializes every feature's classes.
 *
 * @package abhishekWebDeveloper\AwpTheme\Features
 * @author  abhishekWebDeveloper.com
 */

namespace abhishekWebDeveloper\AwpTheme\Features;

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
		// Branding.
	}
}
