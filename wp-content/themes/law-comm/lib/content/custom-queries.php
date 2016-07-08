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
  $vars[] = "teams";
  $vars[] = "keyword";
  $vars[] = "area_of_law";
  $vars[] = "publication";
  $vars[] = "lccp";
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
  $project_title = test_input(get_query_var('project-title'));
  $area_of_law = test_input(get_query_var('area_of_law'));
  $teams = test_input(get_query_var('teams'));

  if(!empty($project_title) || !empty($area_of_law) || !empty($teams)) {
    $projectArgs = array(
      'post_type' => 'project',
      'posts_per_page' => -1
    );

    if(!empty($project_title)) {
      $projectArgs['meta_query'][] = array(
        'relation' => 'OR',
        array(
          'key' => 'title',
          'value' => $project_title,
          'compare' => 'LIKE',
        ),
        array(
          'key' => 'description',
          'value' => $project_title,
          'compare' => 'LIKE',
        ),
        array(
          'key' => 'keywords',
          'value' => $project_title,
          'compare' => 'LIKE',
        ),
      );
    }

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
  $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

  if(!empty($projectIDs)) {
    $args['meta_query'][] = array(
      'key' => 'project',
      'value' => $projectIDs,
      'compare' => 'IN',
    );
  }

  $doc_title = test_input(get_query_var('doc-title'));
  if(!empty($doc_title)) {
    $args['meta_query'][][] = array(
      'relation' => 'OR',
      array(
        'key' => 'title',
        'value' => $doc_title,
        'compare' => 'LIKE',
      ),
      array(
        'key' => 'description',
        'value' => $doc_title,
        'compare' => 'LIKE',
      ),
      array(
        'key' => 'keywords',
        'value' => $doc_title,
        'compare' => 'LIKE',
      ),
    );
  }

  $lccp = test_input(get_query_var('lccp'));
  if(!empty($lccp)) {
    $args['meta_query'][] = array(
      'key' => 'reference_number',
      'value' => $lccp,
      'compare' => 'LIKE',
    );
  }

  $publication = test_input(get_query_var('publication'));
  if(!empty($publication)) {
    $args['tax_query'][] = array(
      'taxonomy' => 'document_type',
      'terms' => $publication,
    );
  }

  if(!empty($publication) && $publication == 17) {
    $args['meta_query'][] = array(
      'key' => 'open_consultation',
      'value' => 1,
      'compare' => '==',
    );
  }

  $start = test_input(get_query_var('start'));
  $end = test_input(get_query_var('end'));
  if(!empty($start) && !empty($end)) {
    $stime = DateTime::createFromFormat("m/d/Y", $start);
    $etime = DateTime::createFromFormat("m/d/Y", $end);

    $args['meta_query'][] = array(
      'key' => 'publication_date',
      'value' => array(date_format($stime, 'Y-m-d'),date_format($etime, 'Y-m-d')),
      'compare' => 'BETWEEN',
      'type' => 'DATE'
    );
  }

  $args['post_type'] = 'document';
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
