<?php
  
function lectures_keyword() {
	$labels = array(
		'name'                       => 'Keywords',
		'singular_name'              => 'Keywords',
		'menu_name'                  => 'Keyword',
		'all_items'                  => 'All Keywords',
		'parent_item'                => 'Parent Keyword',
		'parent_item_colon'          => 'Parent Keyword:',
		'new_item_name'              => 'New Keyword Name',
		'add_new_item'               => 'Add New Keyword',
		'edit_item'                  => 'Edit Keyword',
		'update_item'                => 'Update Keyword',
		'separate_items_with_commas' => 'Separate Keyword with commas',
		'search_items'               => 'Search Keywords',
		'add_or_remove_items'        => 'Add or remove Keywords',
		'choose_from_most_used'      => 'Choose from the most used Keywords',
		'not_found'                  => 'Not Found',
	);
	$rewrite = array(
		'slug'                       => 'lectures_keyword',
		'with_front'                 => true,
		'hierarchical'               => true,
	);
	$capabilities = array(
		'manage_terms'               => 'manage_categories',
		'edit_terms'                 => 'manage_categories',
		'delete_terms'               => 'manage_categories',
		'assign_terms'               => 'edit_posts',
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => false,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
		'rewrite'                    => $rewrite,
		'capabilities'               => $capabilities,
	);
	register_taxonomy( 'lectures_keyword', array( 'lecture' ), $args );
}
add_action( 'init', 'lectures_keyword', 0 );
