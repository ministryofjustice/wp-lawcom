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
		'supports'            => false,
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
		'exclude_from_search' => true,
		'publicly_queryable'  => true,
		'query_var'           => 'document',
		'rewrite'             => $rewrite,
	);
	register_post_type( 'document', $args );

}

add_action( 'init', 'document', 0 );

/**
 * Normalize the document reference number into split fields
 * for later use by the publications search.
 *
 * @param int $post_id
 * @param WP_Post $post
 * @param bool $update
 */
function format_document_reference($post_id, WP_Post $post, $update) {
  $reference = get_post_meta($post_id, 'reference_number', true);

  if (empty($reference) || !contains_document_reference($reference)) return;

  $reference = extract_document_reference($reference);

  update_post_meta($post_id, 'reference_number_prefix', $reference['prefix']);
  update_post_meta($post_id, 'reference_number_number', $reference['number']);
}
add_action('save_post_document', 'format_document_reference', 10, 3);

/**
 * Test if a string is (or contains) a document reference.
 * e.g. "CP123" will return true,
 *      "rhubarb" will return false
 *
 * @param string $string
 * @return bool
 */
function contains_document_reference($string) {
  return (bool) preg_match('/(LC|CP|LCCP)\s*(\d+)/i', $string);
}

/**
 * Extract the component parts of a reference from a valid reference string.
 * e.g. "CP123" will return ['prefix' => 'CP', 'number' => 123]
 *
 * @param string $string
 * @return array with keys: string 'prefix', int 'number'
 */
function extract_document_reference($string) {
  $is_match = preg_match('/(LC|CP|LCCP)\s*(\d+)/i', $string, $matches);

  if (!$is_match) {
    return array();
  }

  switch (strtoupper($matches[1])) {
    case 'LC':
      $prefix = 'LC';
      break;

    case 'CP':
    case 'LCCP':
      $prefix = 'CP';
      break;

    default:
      $prefix = false;
      break;
  }

  $number = intval($matches[2]);

  return array(
    'prefix' => $prefix,
    'number' => $number,
  );
}
