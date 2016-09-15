<?php

/**
 * add_query_vars_filter function.
 *
 * @access public
 * @param mixed $vars
 * @return array
 */
function add_query_vars_filter($vars){
  $vars[] = "keywords";
  $vars[] = "doc-title";
  $vars[] = "project-title";
  $vars[] = "keyword";
  $vars[] = "area-of-law";
  $vars[] = "document-type";
  $vars[] = "start";
  $vars[] = "end";
  return $vars;
}
add_filter('query_vars', 'add_query_vars_filter');

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  $data = esc_sql($data);
  return $data;
}

/**
 * fix_posts_per_page function.
 *
 * @access public
 * @param mixed $value
 * @return int
 */
function fix_posts_per_page( $value ) {
  return (is_post_type_archive('project') || is_post_type_archive('document')) ? 1 : $value;
}
add_filter( 'option_posts_per_page', 'fix_posts_per_page' );

/**
 * project_query function.
 *
 * @access public
 * @return WP_Query
 */
function project_query() {
  $args = array();
  $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

  $keywords = test_input(get_query_var('keywords'));
  if(!empty($keywords)) {
    $args['meta_query'][] = array(
      'relation' => 'OR',
      array(
        'key' => 'title',
        'value' => $keywords,
        'compare' => 'LIKE',
      ),
      array(
        'key' => 'description',
        'value' => $keywords,
        'compare' => 'LIKE',
      ),
      array(
        'key' => 'keywords',
        'value' => $keywords,
        'compare' => 'LIKE',
      ),
    );
  }

  $area_of_law = test_input(get_query_var('area_of_law'));
  if(!empty($area_of_law)) {
    $args['tax_query'][] = array(
      'taxonomy' => 'areas_of_law',
      'terms' => $area_of_law,
    );
  }

  if(isset($args['tax_query']) && count($args['tax_query']) > 1) {
    $args['tax_query']['relation'] = 'AND';
  }

  $args['post_type'] = 'project';
  $args['paged'] = $paged;
  $args['posts_per_page'] = 10;
  $args['order'] = 'ASC';
  if(empty($args['meta_query'])) {
    $args['orderby'] = 'title';
  }
  $wp_query = new WP_Query();
  $wp_query->query($args);

  return $wp_query;
}


/**
 * document_query function.
 *
 * @access public
 * @return WP_Query
 */
function document_query() {
  $args = array(
    'meta_query' => array(),
  );

  $require_projects_join = false;

  /**
   * Publication Name or Reference
   */
  $keywords = get_query_var('keywords');
  if (!empty($keywords)) {
    if (contains_document_reference($keywords)) {
      /**
       * The keywords field contains a document reference number.
       * Find documents with a matching reference number.
       */
      $reference = extract_document_reference($keywords);
      $args['meta_query'][] = array(
        array(
          'key'   => 'reference_number_prefix',
          'value' => $reference['prefix'],
        ),
        array(
          'key'   => 'reference_number_number',
          'value' => $reference['number'],
          'type'  => 'NUMERIC',
        ),
      );
    }
    else {
      /**
       * This looks like a normal keywords query.
       *
       * Attempt to find matches in:
       *  - document title
       *  - description
       *  - keywords
       *  - project title
       */
      $args['meta_query'][] = array(
        'relation' => 'OR',
        array(
          'key'     => 'title',
          'value'   => $keywords,
          'compare' => 'LIKE',
        ),
        array(
          'key'     => 'description',
          'value'   => $keywords,
          'compare' => 'LIKE',
        ),
        array(
          'key'     => 'keywords',
          'value'   => $keywords,
          'compare' => 'LIKE',
        ),
        array(
          // This is a placeholder condition which will be replaced with a 'posts_where' filter
          // See document_query_where_project_title() and document_query_join_projects()
          'key'     => 'project-title-placeholder',
          'value'   => $keywords,
          'compare' => 'LIKE',
        ),
      );

      // Add a filter to replace the 'project-title-placeholder' condition with a
      // project 'post_title' condition.
      add_filter('posts_where', 'document_query_where_project_title', 10, 2);
      $require_projects_join = true;
    }
  }

  /**
   * Area of Law
   */
  $area_of_law = trim(get_query_var('area-of-law'));
  if (!empty($area_of_law) && $area_of_law !== 'any') {
    $args['area_of_law'] = $area_of_law;
    add_filter('posts_where', 'document_query_where_project_area_of_law', 10, 2);
    $require_projects_join = true;
  }

  /**
   * Document Type
   */
  $document_type = trim(get_query_var('document-type'));
  if (!empty($document_type) && $document_type !== 'any') {
    $args['tax_query'][] = array(
      'taxonomy' => 'document_type',
      'terms' => $document_type,
      'field' => 'slug',
    );

    if ($document_type == 'consultations-related-documents') {
      $args['meta_query'][] = array(
        'key' => 'open_consultation',
        'value' => 1,
        'compare' => '==',
      );
    }
  }

  $args['post_type'] = 'document';
  $args['paged'] = get_query_var('paged') ? get_query_var('paged') : 1;
  $args['posts_per_page'] = 10;

  if (empty($args['meta_query'])) {
    $args['orderby'] = 'title';
    $args['order'] = 'ASC';
  }
  else {
    $args['orderby'] = 'meta_value';
    $args['meta_key'] = 'publication_date';
    $args['meta_type'] = 'DATE';
    $args['order'] = 'DESC';
  }

  if ($require_projects_join) {
    add_filter('posts_join', 'document_query_join_projects', 10, 2);
  }

  $query = new WP_Query($args);
  remove_filter('posts_join', 'document_query_join_projects', 10);
  remove_filter('posts_where', 'document_query_where_project_title', 10);
  remove_filter('posts_where', 'document_query_where_project_area_of_law', 10);

  return $query;
}

/**
 * Add SQL LEFT JOIN statement to include the project record that the document
 * belongs to.
 *
 * This joint table (called 'projects') can be used to add WHERE conditions against
 * projects that documents belong to.
 *
 * Filter: posts_join
 *
 * @param string $join
 * @param WP_Query $query
 *
 * @return string
 */
function document_query_join_projects($join, WP_Query $query) {
  global $wpdb;
  $postmeta = "LEFT JOIN {$wpdb->postmeta} AS document_project ON ( {$wpdb->posts}.ID = document_project.post_id AND document_project.meta_key = 'project' )";
  $projects = "LEFT JOIN {$wpdb->posts} AS projects ON ( document_project.meta_value = projects.ID )";
  return implode(" \n ", array($join, $postmeta, $projects));
}

/**
 * Add SQL WHERE condition to find documents based on the associated project title.
 *
 * The existing WHERE condition for the 'project-title-placeholder' post meta field
 * will be replaced with one for the joint projects.post_title field.
 *
 * Requires the 'product' JOIN statement to be added by document_query_join_projects()
 *
 * Filter: posts_where
 *
 * @param string $where
 * @param WP_Query $query
 *
 * @return string
 */
function document_query_where_project_title($where, WP_Query $query) {
  // Add project title to the where condition for keywords
  $find_pattern = '/\(.*?meta_key.*?project-title-placeholder.*?LIKE.*?[\'"]%(.*?)%[\'"].*?\)/';
  $replace_with = "( projects.post_title LIKE '%$1%' )";
  return preg_replace($find_pattern, $replace_with, $where);
}

/**
 * Add SQL WHERE condition to find documents where the associated project
 * has the 'area of law' taxonomy term specified by $query->query['area_of_law']
 *
 * Requires the 'product' JOIN statement to be added by document_query_join_projects()
 *
 * Filter: posts_where
 *
 * @param string $where
 * @param WP_Query $query
 *
 * @return string
 */
function document_query_where_project_area_of_law($where, WP_Query $query) {
  global $wpdb;

  $area_of_law = $query->query['area_of_law'];

  $sql = "SELECT {$wpdb->posts}.ID
            FROM {$wpdb->posts}
            INNER JOIN {$wpdb->term_relationships} ON ( {$wpdb->posts}.ID = {$wpdb->term_relationships}.object_id )
            INNER JOIN {$wpdb->term_taxonomy} ON ( {$wpdb->term_relationships}.term_taxonomy_id = {$wpdb->term_taxonomy}.term_taxonomy_id )
            INNER JOIN {$wpdb->terms} ON ( {$wpdb->term_taxonomy}.term_taxonomy_id = {$wpdb->terms}.term_id )
            WHERE wp_posts.post_type = 'project' AND
            {$wpdb->posts}.post_status = 'publish' AND
            {$wpdb->terms}.slug = %s";

  $sql = $wpdb->prepare($sql, array($area_of_law));
  $sql = ' AND projects.ID IN ( ' . $sql . ' ) ';

  return $where . $sql;
}
