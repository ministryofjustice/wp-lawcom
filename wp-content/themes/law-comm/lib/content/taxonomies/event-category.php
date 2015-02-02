<?php
  
function event_category() {
	$labels = array(
		'name'                       => 'Categories',
		'singular_name'              => 'Category',
		'menu_name'                  => 'Categories',
		'all_items'                  => 'All Categories',
		'parent_item'                => 'Parent Category',
		'parent_item_colon'          => 'Parent Category:',
		'new_item_name'              => 'New Category Name',
		'add_new_item'               => 'Add New Category',
		'edit_item'                  => 'Edit Category',
		'update_item'                => 'Update Category',
		'separate_items_with_commas' => 'Separate Category with commas',
		'search_items'               => 'Search Categories',
		'add_or_remove_items'        => 'Add or remove Categories',
		'choose_from_most_used'      => 'Choose from the most used Categories',
		'not_found'                  => 'Not Found',
	);
	$rewrite = array(
		'slug'                       => 'event_category',
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
	register_taxonomy( 'event_category', array( 'event' ), $args );
}
add_action( 'init', 'event_category', 0 );