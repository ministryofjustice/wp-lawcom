<?php

function event() {

	$labels = array(
		'name'                => 'Events',
		'singular_name'       => 'Event',
		'menu_name'           => 'Events',
		'parent_item_colon'   => 'Parent Event:',
		'all_items'           => 'All Events',
		'view_item'           => 'View Event',
		'add_new_item'        => 'Add New Event',
		'add_new'             => 'Add New',
		'edit_item'           => 'Edit Event',
		'update_item'         => 'Update Event',
		'search_items'        => 'Search Event',
		'not_found'           => 'Not found',
		'not_found_in_trash'  => 'Not found in Trash',
	);
	$rewrite = array(
		'slug'                => 'event',
		'with_front'          => true,
		'pages'               => true,
		'feeds'               => true,
	);
	$args = array(
		'label'               => 'Event',
		'description'         => 'Used to store individual Events',
		'labels'              => $labels,
		'supports'            => array( 'title' ),
		'taxonomies'          => array( ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'menu_icon'           => 'dashicons-calendar-alt',
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'query_var'           => 'event',
		'rewrite'             => $rewrite,
	);
	register_post_type( 'event', $args );

}

add_action( 'init', 'event', 0 );
