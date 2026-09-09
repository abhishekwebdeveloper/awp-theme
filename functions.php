<?php
/**
 * Theme entry point: load the autoloader, then boot the theme.
 *
 * @package abhishekWebDeveloper\AwpTheme
 * @author  abhishekWebDeveloper.com
 */

namespace abhishekWebDeveloper\AwpTheme;

defined( 'ABSPATH' ) || die();

// Autoload theme classes and third-party packages using Composer.
if ( ! file_exists( __DIR__ . '/vendor/autoload.php' ) ) {
	add_action(
		'admin_notices',
		function (): void {
			wp_admin_notice(
				sprintf(
					/* translators: 1: command, 2: directory path. */
					__( 'AWP Theme: Run %1$s at %2$s to generate autoload files.', 'awp-theme' ),
					'<code>composer install</code>',
					'<code>' . esc_html( __DIR__ ) . '</code>',
				),
				[
					'additional_classes' => [ 'awp-theme-notice' ],
					'type'               => 'error',
				]
			);
		}
	);

	return;
}

// Load the autoloader.
require_once __DIR__ . '/vendor/autoload.php';

// Boot the theme core, features, and plugin integrations, in that order.
// Features and plugin integrations depend on the theme core's Skeleton hooks and theme support.
Index::boot();
Features\Index::boot();
Plugins\Index::boot();
