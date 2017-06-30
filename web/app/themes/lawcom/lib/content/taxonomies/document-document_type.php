<?php
  
function document_type() {
	$labels = array(
		'name'                       => 'Document Types',
		'singular_name'              => 'Document Type',
		'menu_name'                  => 'Document Type',
		'all_items'                  => 'All Document Types',
		'parent_item'                => 'Parent Document Type',
		'parent_item_colon'          => 'Parent Document Type:',
		'new_item_name'              => 'New Document Type Name',
		'add_new_item'               => 'Add New Document Type',
		'edit_item'                  => 'Edit Document Type',
		'update_item'                => 'Update Document Type',
		'separate_items_with_commas' => 'Separate Document Type with commas',
		'search_items'               => 'Search Document Types',
		'add_or_remove_items'        => 'Add or remove Document Types',
		'choose_from_most_used'      => 'Choose from the most used Document Types',
		'not_found'                  => 'Not Found',
	);
	$rewrite = array(
		'slug'                       => 'document_type',
		'with_front'                 => true,
		'hierarchical'               => true,
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
	register_taxonomy( 'document_type', array( 'document' ), $args );
}
add_action( 'init', 'document_type', 0 );