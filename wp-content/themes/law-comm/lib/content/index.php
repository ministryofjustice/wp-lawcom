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

$widgets = scandir( get_template_directory() . "/lib/content/widgets/" );
foreach ( $widgets as $widget ) {
	if ( $widget[0] != "." )
		require get_template_directory() . '/lib/content/widgets/' . $widget;
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

/**
 * Hide editor on homepage.
 *
 */
add_action('init', 'remove_editor_init');
function remove_editor_init() {
    // if post not set, just return 
    // fix when post not set, throws PHP's undefined index warning
    if (isset($_GET['post'])) {
        $post_id = $_GET['post'];
    } else if (isset($_POST['post_ID'])) {
        $post_id = $_POST['post_ID'];
    } else {
        return;
    }
    $template_file = get_post_meta($post_id, '_wp_page_template', TRUE);
    if ($template_file == 'page-home.php') {
        remove_post_type_support('page', 'editor');
    }
}