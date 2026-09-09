<?php
/**
 * Theme Core PHP Index.
 *
 * @package abhishekWebDeveloper\AwpTheme
 * @author  abhishekWebDeveloper.com
 */

namespace abhishekWebDeveloper\AwpTheme;

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
		// Skeleton.
		Skeleton\Footer::boot();
		Skeleton\Header::boot();
		Skeleton\Main::boot();
		Skeleton\Middle::boot();
		Skeleton\MobileNavigation::boot();
		Skeleton\Sidebar::boot();
		Skeleton\SidebarCta::boot();
		Skeleton\Site::boot();

		// Hooks.
		Hooks\Menus::boot();
		Hooks\ThemeSupport::boot();

		// HooksFrontend.
		HooksFrontend\Scripts::boot();
	}
}
