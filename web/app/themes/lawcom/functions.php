<?php

/**
 * Roots includes
 *
 * The $roots_includes array determines the code library included in your theme.
 * Add or remove files to the array as needed. Supports child theme overrides.
 *
 * Please note that missing files will produce a fatal error.
 *
 * @link https://github.com/roots/roots/pull/1042
 */
$roots_includes = array(
	'lib/utils.php', // Utility functions
	'lib/init.php', // Initial theme setup and constants
	'lib/wrapper.php', // Theme wrapper class
	'lib/sidebar.php', // Sidebar class
	'lib/config.php', // Configuration
	'lib/activation.php', // Theme activation
	'lib/titles.php', // Page titles
	'lib/nav.php', // Custom nav modifications
	'lib/gallery.php', // Custom [gallery] modifications
	'lib/comments.php', // Custom comments modifications
	'lib/scripts.php', // Scripts and stylesheets
	'lib/extras.php', // Custom functions
	'lib/pages.php', //Settings and styling for list of pages page
	'lib/content/settings.php', // Add new settings to the Settings tab
	'lib/content/index.php',
	'lib/emergency-banner-settings.php',
);

foreach ( $roots_includes as $file ) {
	if ( !$filepath = locate_template( $file ) ) {
		trigger_error( sprintf( __( 'Error locating %s for inclusion', 'roots' ), $file ), E_USER_ERROR );
	}

	require_once $filepath;
}
unset( $file, $filepath );

/**
 * Get the current version of WP
 *
 * This is provided for external resources to resolve the current wp_version
 *
 * @return string
 */
function moj_wp_version()
{
  global $wp_version;
  return $wp_version;
}

add_action('rest_api_init', function () {
  register_rest_route('moj', '/version', array(
    'methods' => 'GET',
    'callback' => 'moj_wp_version'
  ));
});
