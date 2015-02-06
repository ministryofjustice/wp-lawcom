<?php

/**
 * add_query_vars_filter function.
 * 
 * @access public
 * @param mixed $vars
 * @return void
 */
function add_query_vars_filter($vars){
  $vars[] = "title";
  $vars[] = "keyword";
  $vars[] = "area_of_law";
  return $vars;
}
add_filter('query_vars', 'add_query_vars_filter');


/*function custom_rewrites() {
  add_rewrite_rule(
    '^project/([^&]+)/([^&]+)/([^&]+)/?',
    'index.php?post_type=project&title=$matches[1]&keyword=$matches[2]&area_of_law=$matches[3]', 
    'top'
  );
}
add_action('init', 'custom_rewrites');*/


function project_query() {
  $wp_query = NULL;
  $args = array();
  $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
  
  /*switch(get_query_var('order')) {
    case "name-asc": $args['order'] = "ASC"; $args['orderby'] = "title"; break;
    case "name-desc": $args['orderby'] = "title"; break;
    case "date-asc": $args['order'] = "ASC"; break;
    default: break;
  }*/
  
  if(!empty(get_query_var('title'))) {
    $args['meta_query'][] = array(
        'key' => 'title',
        'value' => get_query_var('title'),
        'compare' => 'LIKE'
    );
  }
  
  if(!empty(get_query_var('keyword'))) {
    $terms = explode(",", get_query_var('keyword'));
    $args['tax_query'][] = array(
      'taxonomy' => 'project_keyword',
      'field' => 'name',
      'terms' => $terms,
    );
  }
  
  if(!empty(get_query_var('area_of_law'))) {
    $args['tax_query'][] = array(
      'taxonomy' => 'areas_of_law',
      'terms' => get_query_var('area_of_law'),
    );
  }
  
  if($args['tax_query'] && count($args['tax_query']) > 1) {
    $args['tax_query']['relation'] = 'AND';
  }
  
  $args['post_type'] = 'project';
  $args['posts_per_page'] = 1;
  $args['paged'] = 1;
  echo "<pre>"; var_dump($args); echo "</pre>";
  $wp_query = new WP_Query($args);
  
  return $wp_query;
}