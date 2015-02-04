<?php

/**
 * add_query_vars_filter function.
 * 
 * @access public
 * @param mixed $vars
 * @return void
 */
function add_query_vars_filter($vars){
  $vars[] = "var1";
  $vars[] = "var2";
  return $vars;
}
add_filter('query_vars', 'add_query_vars_filter');


function custom_rewrites() {
  add_rewrite_rule(
    '^project/([0-9]+)/?', 
    'index.php?post_type=project&page_id=$matches[1]', 
    'top'
  );
}
add_action('init', 'custom_rewrites');


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
  
  /*if(!empty(get_query_var('a')) {
    $args['meta_query'][] = array(
        'key' => '',
        'value' => get_query_var('a'),
    );
  }*/
  
  $args['post_type'] = 'project';
  $args['showposts'] = 10;
  $args['paged'] = $paged;
  $wp_query = new WP_Query($args);
  
  return $wp_query;
}