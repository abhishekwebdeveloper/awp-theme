<?php
/**
 * Boot a class's one-time setup exactly once.
 *
 * @package abhishekWebDeveloper\AwpTheme\Helpers
 * @author  abhishekWebDeveloper.com
 */

namespace abhishekWebDeveloper\AwpTheme\Helpers;

defined( 'ABSPATH' ) || die();

/**
 * Boots a class's one-time setup exactly once.
 */
trait BootsOnceTrait {
	/**
	 * Whether the class has booted.
	 *
	 * @var bool
	 */
	private static bool $booted = false;

	/**
	 * Prevent instantiation; the class is used statically.
	 */
	private function __construct() {}

	/**
	 * Boot the class, once per class.
	 */
	final public static function boot(): void {
		if ( static::$booted ) {
			return;
		}

		static::$booted = true;

		static::on_boot();
	}

	/**
	 * Run the class's one-time boot tasks.
	 */
	abstract protected static function on_boot(): void;
}
