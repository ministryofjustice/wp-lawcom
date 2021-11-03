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
	'lib/content/settings.php', // Add new settings to the Settings tab
	'lib/content/index.php',
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

add_filter('manage_page_posts_columns', function($columns) {
	$offset = array_search('title', array_keys($columns));
	return array_merge(array_slice($columns, 0, $offset), ['welsh' => __('', 'textdomain')], array_slice($columns, $offset, null));
});
 
add_action('manage_pages_custom_column', function($column_key, $post_id) {
	if ($column_key == 'welsh') {
		$welsh = get_post_meta($post_id, 'welsh', true);
		if ($welsh) {
			echo '<span style="font-size:200%;" aria-label="'.__('This page is in Welsh', 'textdomain').'">🏴󠁧󠁢󠁷󠁬󠁳󠁿</span>';
		}
	}
}, 10, 2);

add_action('admin_head', 'column_style');
function column_style() {
    echo '<style type="text/css">';
    echo '.table-view-list.pages .column-welsh { padding:5px 0; width:2em; text-align:center;}';
    echo '</style>';
}
