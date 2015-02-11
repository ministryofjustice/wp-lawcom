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
  $vars[] = "publication";
  return $vars;
}
add_filter('query_vars', 'add_query_vars_filter');


/**
 * fix_posts_per_page function.
 * 
 * @access public
 * @param mixed $value
 * @return void
 */
function fix_posts_per_page( $value ) {
  return (is_post_type_archive('project') || is_post_type_archive('document')) ? 1 : $value;
}
add_filter( 'option_posts_per_page', 'fix_posts_per_page' );

/**
 * project_query function.
 * 
 * @access public
 * @return void
 */
function project_query() {
  $temp = $wp_query;
  $wp_query = NULL;
  $args = array();
  $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
    
  if(!empty(get_query_var('title'))) {
    $args['p'] = get_query_var('title');
  }
  
  if(!empty(get_query_var('keyword'))) {    
    $args['meta_query'][] = array(
      'relation' => 'OR',
      array(
        'key' => 'title',
        'value' => get_query_var('keyword'),
        'compare' => 'LIKE',
      ),
      array(
        'key' => 'description',
        'value' => get_query_var('keyword'),
        'compare' => 'LIKE',
      ),
      array(
        'key' => 'keywords',
        'value' => get_query_var('keyword'),
        'compare' => 'LIKE',
      ),      
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
  $args['paged'] = $paged;
  $args['posts_per_page'] = 10;
  $wp_query = new WP_Query();
  $wp_query->query($args);
  
  return $wp_query;
}


/**
 * document_query function.
 * 
 * @access public
 * @return void
 */
function document_query() {
  $temp = $wp_query;
  $wp_query = NULL;
  $args = array();
  $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
  
  $args['post_type'] = 'document';
  $args['paged'] = $paged;
  $args['posts_per_page'] = 10;
  $wp_query = new WP_Query();
  $wp_query->query($args); 
  return $wp_query;
}