<?php

function project() {
	$labels = array(
		'name'                => 'Projects',
		'singular_name'       => 'Project',
		'menu_name'           => 'Projects',
		'parent_item_colon'   => 'Parent Project:',
		'all_items'           => 'All Projects',
		'view_item'           => 'View Project',
		'add_new_item'        => 'Add New Project',
		'add_new'             => 'Add New',
		'edit_item'           => 'Edit Project',
		'update_item'         => 'Update Project',
		'search_items'        => 'Search Project',
		'not_found'           => 'Not found',
		'not_found_in_trash'  => 'Not found in Trash',
	);
	$rewrite = array(
		'slug'                => 'project',
		'with_front'          => true,
		'pages'               => true,
		'feeds'               => true,
	);
	$args = array(
		'label'               => 'project',
		'description'         => 'Used to store individual projects',
		'labels'              => $labels,
		'supports'            => false,
		'taxonomies'          => array( ),
		'hierarchical'        => true,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'menu_icon'           => 'dashicons-portfolio',
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'query_var'           => 'project',
		'rewrite'             => $rewrite,
	);
	register_post_type( 'project', $args );
}
add_action( 'init', 'project', 0 );
