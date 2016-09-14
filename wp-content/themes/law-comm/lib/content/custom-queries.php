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
  $vars[] = "area_of_law";
  $vars[] = "publication";
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

  /*$project_title = test_input(get_query_var('project-title'));
  $area_of_law = test_input(get_query_var('area_of_law'));
  $teams = test_input(get_query_var('teams'));

  if(!empty($project_title) || !empty($area_of_law) || !empty($teams)) {
    $projectArgs = array(
      'post_type' => 'project',
      'posts_per_page' => -1
    );

    if(!empty($area_of_law)) {
      $projectArgs['tax_query'][] = array(
        'taxonomy' => 'areas_of_law',
        'terms' => $area_of_law,
      );
    }

    if(!empty($teams)) {
      $projectArgs['tax_query'][] = array(
        'taxonomy' => 'team',
        'terms' => $teams,
      );
    }

    if(!empty($projectArgs['tax_query']) && count($projectArgs['tax_query']) > 1) {
      $projectArgs['tax_query']['relation'] = 'AND';
    }

    $projects = get_posts($projectArgs);
    $projectIDs = array();
    foreach($projects as $project) {
      $projectIDs[] = $project->ID;
    }
  }

  if(!empty($wp_query)) {
    $temp = $wp_query;
    $wp_query = NULL;
  }

  if(!empty($projectIDs)) {
    $args['meta_query'][] = array(
      'key' => 'project',
      'value' => $projectIDs,
      'compare' => 'IN',
    );
  }
  }*/

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
    }
  }

  $area_of_law = trim(get_query_var('area_of_law'));
  if ($area_of_law) {
    $args['meta_query'][] = array(
      'key' => 'project',
      'compare' => 'EXISTS',
    );

    $args['area_of_law'] = intval($area_of_law);
    add_filter('posts_where', 'document_query_where_project_area_of_law', 10, 2);
  }

  $publication = trim(get_query_var('publication'));
  if (!empty($publication)) {
    $publication = intval($publication);

    $args['tax_query'][] = array(
      'taxonomy' => 'document_type',
      'terms' => $publication,
    );

    if ($publication == 17) {
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
  $args['order'] = 'ASC';
  if (empty($args['meta_query'])) {
    $args['orderby'] = 'title';
  }

  if (!empty($args['meta_query'])) {
    add_filter( 'posts_join', 'document_query_join_projects', 10, 2 );
  }

  $query = new WP_Query($args);
  remove_filter('posts_join', 'document_query_join_projects', 10);
  remove_filter('posts_where', 'document_query_where_project_title', 10);
  remove_filter('posts_where', 'document_query_where_project_area_of_law', 10);

  return $query;
}

/**
 * Adjust SQL to create a LEFT JOIN to attach documents to their associated project.
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
  $projects = "LEFT JOIN {$wpdb->posts} AS projects ON ( {$wpdb->postmeta}.meta_key = 'project' AND {$wpdb->postmeta}.meta_value = projects.ID )";
  return $join . " \n$projects ";
}

/**
 * Adjust SQL to add a WHERE condition on the project title associated with the
 * document. This relies on the JOIN statement being added by document_query_join_projects().
 *
 * The existing WHERE condition for the 'project-title-placeholder' post meta field
 * will be replaced with one for the joint projects.post_title field.
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
 * Adjust SQL to add WHERE condition on the project ID associated with the document.
 * This relies on the JOIN statement being added by document_query_join_projects().
 *
 * @TODO: Add better documentation here.
 *
 * @param string $where
 * @param WP_Query $query
 * @return string
 */
function document_query_where_project_area_of_law($where, WP_Query $query) {
  global $wpdb;

  $area_of_law = $query->query['area_of_law'];

  $sql = "SELECT {$wpdb->posts}.ID
            FROM {$wpdb->posts}
            INNER JOIN {$wpdb->term_relationships} ON ( {$wpdb->posts}.ID = {$wpdb->term_relationships}.object_id )
            INNER JOIN wp_term_taxonomy ON ( {$wpdb->term_relationships}.term_taxonomy_id = {$wpdb->term_taxonomy}.term_taxonomy_id )
            WHERE wp_posts.post_type = 'project' AND
            wp_posts.post_status = 'publish' AND
            wp_term_taxonomy.term_id = %d";

  $sql = $wpdb->prepare($sql, array($area_of_law));
  $sql = ' AND projects.ID IN ( ' . $sql . ' ) ';

  return $where . $sql;
}
