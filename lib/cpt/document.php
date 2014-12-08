<?php

// Document CPT
function document_cpt_init() {
	$document_labels = array(
		'name' => 'Documents',
		'singular_name' => 'Document',
		'add_new' => 'Add New',
		'add_new_item' => 'Add New Document',
		'edit_item' => 'Edit Document',
		'new_item' => 'New Document',
		'all_items' => 'All Documents',
		'view_item' => 'View Document',
		'search_items' => 'Search Documents',
		'not_found' => 'No document found',
		'not_found_in_trash' => 'No document found in Trash',
		'parent_item_colon' => '',
		'menu_name' => 'Documents'
	);
	$document_args = array(
		'labels' => $document_labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'show_in_nav_menus' => false,
		'query_var' => true,
		'exclude_from_search' => false,
		'rewrite' => array( 'slug' => 'documents', 'with_front' => FALSE ), // TODO: Change based on 
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
		'has_archive' => 'documents',
		'hierarchical' => false,
		'menu_position' => null,
		'supports' => array( 'title' ),
		'taxonomies' => array( 'document_type' )
	);
	register_post_type( 'document', $document_args );
}

add_action( 'init', 'document_cpt_init' );

function create_document_taxonomies() {
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
		'new_item_name' => __( 'New Areas of Law Name' ),
		'menu_name' => __( 'Areas of Law' ),
	);
	$area_of_law_args = array(
		'hierarchical' => true,
		'labels' => $area_of_law_labels,
		'show_ui' => true,
		'show_admin_column' => true,
		'query_var' => true,
		'rewrite' => array( 'slug' => 'document', 'with_front' => false ),
	);
	register_taxonomy( 'area_of_law', array( 'document' ), $area_of_law_args );
}

add_action( 'init', 'create_document_taxonomies', 0 );
