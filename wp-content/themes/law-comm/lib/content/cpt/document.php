<?php

function document() {

	$labels = array(
		'name'                => 'Documents',
		'singular_name'       => 'Document',
		'menu_name'           => 'Documents',
		'parent_item_colon'   => 'Parent Document:',
		'all_items'           => 'All Documents',
		'view_item'           => 'View Document',
		'add_new_item'        => 'Add New Document',
		'add_new'             => 'Add New',
		'edit_item'           => 'Edit Document',
		'update_item'         => 'Update Document',
		'search_items'        => 'Search Document',
		'not_found'           => 'Not found',
		'not_found_in_trash'  => 'Not found in Trash',
	);
	$rewrite = array(
		'slug'                => 'document',
		'with_front'          => true,
		'pages'               => true,
		'feeds'               => true,
	);
	$args = array(
		'label'               => 'Document',
		'description'         => 'Used to store individual Documents',
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
		'menu_icon'           => 'dashicons-media-document',
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'query_var'           => 'document',
		'rewrite'             => $rewrite,
	);
	register_post_type( 'document', $args );

}

add_action( 'init', 'document', 0 );
