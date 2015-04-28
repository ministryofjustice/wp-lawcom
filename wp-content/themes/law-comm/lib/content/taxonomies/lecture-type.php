<?php
  
function type() {
	$labels = array(
		'name'                       => 'Types',
		'singular_name'              => 'Type',
		'menu_name'                  => 'Types',
		'all_items'                  => 'All Types',
		'parent_item'                => 'Parent Type',
		'parent_item_colon'          => 'Parent Type:',
		'new_item_name'              => 'New Type Name',
		'add_new_item'               => 'Add Type',
		'edit_item'                  => 'Edit Type',
		'update_item'                => 'Update Type',
		'separate_items_with_commas' => 'Separate Type with commas',
		'search_items'               => 'Search Types',
		'add_or_remove_items'        => 'Add or remove Types',
		'choose_from_most_used'      => 'Choose from the most used Type',
		'not_found'                  => 'Not Found',
	);
	$rewrite = array(
		'slug'                       => 'type',
		'with_front'                 => true,
		'hierarchical'               => false,
	);
	$capabilities = array(
		'manage_terms'               => 'manage_categories',
		'edit_terms'                 => 'manage_categories',
		'delete_terms'               => 'manage_categories',
		'assign_terms'               => 'edit_posts',
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
		'rewrite'                    => $rewrite,
		'capabilities'               => $capabilities,
	);
	register_taxonomy( 'type', array( 'lecture' ), $args );
}
add_action( 'init', 'type', 0 );
