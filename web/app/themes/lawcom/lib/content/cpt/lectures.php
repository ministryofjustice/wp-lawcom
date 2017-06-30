<?php

function lecture() {

	$labels = array(
		'name'                => 'Lectures / Talks',
		'singular_name'       => 'Lecture / Talk',
		'menu_name'           => 'Lectures / Talks',
		'parent_item_colon'   => 'Parent Lecture / Talk:',
		'all_items'           => 'All Lectures / Talks',
		'view_item'           => 'View Lecture / Talk',
		'add_new_item'        => 'Add New Lecture / Talk',
		'add_new'             => 'Add New',
		'edit_item'           => 'Edit Lecture / Talk',
		'update_item'         => 'Update Lecture / Talk',
		'search_items'        => 'Search Lecture / Talk',
		'not_found'           => 'Not found',
		'not_found_in_trash'  => 'Not found in Trash',
	);
	$rewrite = array(
		'slug'                => 'lectures-talks',
		'with_front'          => true,
		'pages'               => true,
		'feeds'               => true,
	);
	$args = array(
		'label'               => 'Lectures & Talks',
		'description'         => 'Used to store individual Lectures & Talks',
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor' ),
		'taxonomies'          => array( ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'menu_icon'           => 'dashicons-welcome-learn-more',
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'query_var'           => 'lectures',
		'rewrite'             => $rewrite,
	);
	register_post_type( 'lecture', $args );

}

add_action( 'init', 'lecture', 0 );
