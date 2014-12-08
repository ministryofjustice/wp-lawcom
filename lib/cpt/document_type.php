<?php

// Document Type CPT
function document_type_cpt_init() {
	$document_type_labels = array(
		'name' => 'Document Types',
		'singular_name' => 'Document Type',
		'add_new' => 'Add New',
		'add_new_item' => 'Add New Document Type',
		'edit_item' => 'Edit Document Type',
		'new_item' => 'New Document Type',
		'all_items' => 'All Document Types',
		'view_item' => 'View Document Type',
		'search_items' => 'Search Document Types',
		'not_found' => 'No document types found',
		'not_found_in_trash' => 'No document type found in Trash',
		'parent_item_colon' => '',
		'menu_name' => 'Document Types'
	);
	$document_type_args = array(
		'labels' => $document_type_labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'show_in_nav_menus' => false,
		'query_var' => true,
		'exclude_from_search' => false,
		'rewrite' => array( 'slug' => 'document_types', 'with_front' => FALSE ), // TODO: Change based on 
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
		'has_archive' => 'document_types',
		'hierarchical' => false,
		'menu_position' => null,
		'supports' => array( 'title' ),
	);
	register_post_type( 'document_type', $document_type_args );
}

add_action( 'init', 'document_type_cpt_init' );

function create_document_type_taxonomies() {
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
