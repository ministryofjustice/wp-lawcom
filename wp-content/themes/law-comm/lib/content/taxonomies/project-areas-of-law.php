<?php
  
function areas_of_law() {
	$labels = array(
		'name'                       => 'Areas of Law',
		'singular_name'              => 'Area of Law',
		'menu_name'                  => 'Areas of Law',
		'all_items'                  => 'All Areas of Law',
		'parent_item'                => 'Parent Area of Law',
		'parent_item_colon'          => 'Parent Area of Law:',
		'new_item_name'              => 'New Area of Law Name',
		'add_new_item'               => 'Add New Area of Law',
		'edit_item'                  => 'Edit Area of Law',
		'update_item'                => 'Update Area of Law',
		'separate_items_with_commas' => 'Separate Area of Law with commas',
		'search_items'               => 'Search Areas of Law',
		'add_or_remove_items'        => 'Add or remove areas of law',
		'choose_from_most_used'      => 'Choose from the most used areas of law',
		'not_found'                  => 'Not Found',
	);
	$rewrite = array(
		'slug'                       => 'project',
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
	register_taxonomy( 'areas-of-law', array( 'project' ), $args );
}
add_action( 'init', 'areas_of_law', 0 );