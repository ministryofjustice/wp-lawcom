<?php
  
$cpts = scandir( get_template_directory() . "/lib/content/cpt/" );
foreach ( $cpts as $cpt ) {
	if ( $cpt[0] != "." )
		require get_template_directory() . '/lib/content/cpt/' . $cpt;
}

$taxonomies = scandir( get_template_directory() . "/lib/content/taxonomies/" );
foreach ( $taxonomies as $taxonomy ) {
	if ( $taxonomy[0] != "." )
		require get_template_directory() . '/lib/content/taxonomies/' . $taxonomy;
}

add_filter( 'ot_theme_mode', '__return_true' );
add_filter( 'ot_show_pages', '__return_false' );
add_filter( 'ot_show_new_layout', '__return_false' );
add_filter( 'ot_use_theme_options', '__return_true' );
add_filter( 'ot_header_version_text', '__return_null' );
//add_filter( 'ot_override_forced_textarea_simple', '__return_true' );
require( trailingslashit( get_template_directory() ) . 'option-tree/ot-loader.php' );

require( trailingslashit( get_template_directory() ) . 'lib/content/metaboxes/index.php' );
require( trailingslashit( get_template_directory() ) . 'lib/content/metaboxes/array.php' );