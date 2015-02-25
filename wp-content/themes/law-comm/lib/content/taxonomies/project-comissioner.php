<?php
  
function commissioner() {
	$labels = array(
		'name'                       => 'Commissioners',
		'singular_name'              => 'Commissioner',
		'menu_name'                  => 'Commissioners',
		'all_items'                  => 'All Commissioners',
		'parent_item'                => 'Parent Commissioner',
		'parent_item_colon'          => 'Parent Commissioner:',
		'new_item_name'              => 'New Commissioner Name',
		'add_new_item'               => 'Add Commissioner',
		'edit_item'                  => 'Edit Commissioner',
		'update_item'                => 'Update Commissioner',
		'separate_items_with_commas' => 'Separate Commissioner with commas',
		'search_items'               => 'Search Commissioners',
		'add_or_remove_items'        => 'Add or remove Commissioners',
		'choose_from_most_used'      => 'Choose from the most used Commissioner',
		'not_found'                  => 'Not Found',
	);
	$rewrite = array(
		'slug'                       => 'commissioner',
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
	register_taxonomy( 'commissioner', array( 'project' ), $args );
}
add_action( 'init', 'commissioner', 0 );