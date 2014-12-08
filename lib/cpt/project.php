<?php

// Project CPT
function project_cpt_init() {
	$project_labels = array(
		'name' => 'Projects',
		'singular_name' => 'Project',
		'add_new' => 'Add New',
		'add_new_item' => 'Add New Project',
		'edit_item' => 'Edit Project',
		'new_item' => 'New Project',
		'all_items' => 'All Projects',
		'view_item' => 'View Project',
		'search_items' => 'Search Projects',
		'not_found' => 'No project found',
		'not_found_in_trash' => 'No project found in Trash',
		'parent_item_colon' => '',
		'menu_name' => 'Projects'
	);
	$project_args = array(
		'labels' => $project_labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'show_in_nav_menus' => false,
		'query_var' => true,
		'exclude_from_search' => false,
		'rewrite' => array( 'slug' => 'projects', 'with_front' => FALSE ), // TODO: Change based on 
		'capabilities' => array(
			'publish_posts' => 'delete_others_posts',
			'edit_posts' => 'delete_others_posts',
			'edit_others_posts' => 'delete_others_posts',
			'delete_posts' => 'delete_others_posts',
			'delete_others_posts' => 'delete_others_posts',
			'read_private_posts' => 'delete_others_posts',
			'edit_post' => 'delete_others_posts',
			'delete_post' => 'delete_others_posts',
			'read_post' => 'delete_others_posts'
		),
		'has_archive' => 'projects',
		'hierarchical' => false,
		'menu_position' => null,
		'supports' => array( 'title' ),
		'taxonomies' => array( 'project_type' )
	);
	register_post_type( 'project', $project_args );
}

add_action( 'init', 'project_cpt_init' );

function create_project_taxonomies() {
	// Area of law
	$area_of_law_labels = array(
		'name' => _x( 'Areas of Law', 'taxonomy general name' ),
		'singular_name' => _x( 'Area of Law', 'taxonomy singular name' ),
		'search_items' => __( 'Search Areas of Law' ),
		'all_items' => __( 'All Areas of Law' ),
		'parent_item' => __( 'Parent Area of Law' ),
		'parent_item_colon' => __( 'Parent Area of Law:' ),
		'edit_item' => __( 'Edit Area of Law' ),
		'update_item' => __( 'Update Area of Law' ),
		'add_new_item' => __( 'Add New Area of Law' ),
		'new_item_name' => __( 'New Area of Law Name' ),
		'menu_name' => __( 'Areas of Law' ),
	);
	$area_of_law_args = array(
		'hierarchical' => true,
		'labels' => $area_of_law_labels,
		'show_ui' => true,
		'show_admin_column' => true,
		'query_var' => true,
		'rewrite' => array( 'slug' => 'project', 'with_front' => false ),
	);
	register_taxonomy( 'area_of_law', array( 'project' ), $area_of_law_args );

	// Team
	$team_labels = array(
		'name' => _x( 'Teams', 'taxonomy general name' ),
		'singular_name' => _x( 'Team', 'taxonomy singular name' ),
		'search_items' => __( 'Search Teams' ),
		'all_items' => __( 'All Teams' ),
		'parent_item' => __( 'Parent Team' ),
		'parent_item_colon' => __( 'Parent Team:' ),
		'edit_item' => __( 'Edit Team' ),
		'update_item' => __( 'Update Team' ),
		'add_new_item' => __( 'Add New Team' ),
		'new_item_name' => __( 'New Team Name' ),
		'menu_name' => __( 'Teams' ),
	);
	$team_args = array(
		'hierarchical' => true,
		'labels' => $team_labels,
		'show_ui' => true,
		'show_admin_column' => true,
		'query_var' => true,
		'rewrite' => array( 'slug' => 'team', 'with_front' => false ),
	);
	register_taxonomy( 'team', array( 'project' ), $team_args );

	// Commissioner
	$commissioner_labels = array(
		'name' => _x( 'Commissioners', 'taxonomy general name' ),
		'singular_name' => _x( 'Commissioner', 'taxonomy singular name' ),
		'search_items' => __( 'Search Commissioners' ),
		'all_items' => __( 'All Commissioners' ),
		'parent_item' => __( 'Parent Commissioner' ),
		'parent_item_colon' => __( 'Parent Commissioner:' ),
		'edit_item' => __( 'Edit Commissioner' ),
		'update_item' => __( 'Update Commissioner' ),
		'add_new_item' => __( 'Add New Commissioner' ),
		'new_item_name' => __( 'New Commissioner Name' ),
		'menu_name' => __( 'Commissioners' ),
	);
	$commissioner_args = array(
		'hierarchical' => true,
		'labels' => $commissioner_labels,
		'show_ui' => true,
		'show_admin_column' => true,
		'query_var' => true,
		'rewrite' => array( 'slug' => 'commissioner', 'with_front' => false ),
	);
	register_taxonomy( 'commissioner', array( 'project' ), $commissioner_args );
}

add_action( 'init', 'create_project_taxonomies', 0 );
