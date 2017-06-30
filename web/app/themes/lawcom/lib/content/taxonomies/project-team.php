<?php
  
function team() {
	$labels = array(
		'name'                       => 'Teams',
		'singular_name'              => 'Team',
		'menu_name'                  => 'Teams',
		'all_items'                  => 'All Teams',
		'parent_item'                => 'Parent Team',
		'parent_item_colon'          => 'Parent Team:',
		'new_item_name'              => 'New Team Name',
		'add_new_item'               => 'Add Team',
		'edit_item'                  => 'Edit Team',
		'update_item'                => 'Update Team',
		'separate_items_with_commas' => 'Separate Team with commas',
		'search_items'               => 'Search Teams',
		'add_or_remove_items'        => 'Add or remove Teams',
		'choose_from_most_used'      => 'Choose from the most used Team',
		'not_found'                  => 'Not Found',
	);
	$rewrite = array(
		'slug'                       => 'team',
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
	register_taxonomy( 'team', array( 'project' ), $args );
}
add_action( 'init', 'team', 0 );