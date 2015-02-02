<?php

/**
 * Custom functions
 */

//Load CPTs

// $cpt_declarations = scandir( get_template_directory() . "/lib/cpt/" );
// foreach ( $cpt_declarations as $cpt_declaration ) {
// 	if ( $cpt_declaration[0] != "." )
// 		require get_template_directory() . '/lib/cpt/' . $cpt_declaration;
// }

// /* Get attachment ID from URL */
// function get_attachment_id_from_src( $image_src ) {
// 	global $wpdb;
// 	$query = "SELECT ID FROM {$wpdb->posts} WHERE guid='$image_src'";
// 	$id = $wpdb->get_var( $query );
// 	return $id;
// }

/**
 * Meta Boxes
 */
load_template( trailingslashit( get_template_directory() ) . 'lib/meta-boxes.php' );

/* Setup option tree */
add_filter( 'ot_theme_mode', '__return_true' );
add_filter( 'ot_show_pages', '__return_false' );
add_filter( 'ot_show_new_layout', '__return_false' );
add_filter( 'ot_use_theme_options', '__return_false' );
add_filter( 'ot_header_version_text', '__return_null' );
//load_template( trailingslashit( get_template_directory() ) . 'lib/theme-options.php' );
require_once (trailingslashit( get_template_directory() ) . 'option-tree/ot-loader.php');


