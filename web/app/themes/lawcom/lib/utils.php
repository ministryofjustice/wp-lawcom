<?php
/**
 * Utility functions
 */
function is_element_empty($element) {
  $element = trim($element);
  return !empty($element);
}

// Tell WordPress to use searchform.php from the templates/ directory
function roots_get_search_form($form) {
  $form = '';
  locate_template('/templates/searchform.php', true, false);
  return $form;
}
add_filter('get_search_form', 'roots_get_search_form');

function project_has_documents($projectId) {
  $documents = new WP_Query(array(
    'post_type' => 'document',
    'meta_query' => array(array(
      'key' => 'project',
      'value' => $projectId,
      'compare' => '='
    ))
  ));

  return $documents->have_posts();
}

// Tell WordPress to use searchform.php from the templates/ directory
function get_feedback_banner() {
  locate_template('/templates/feedback-banner.php', true, false);
}
add_filter('get_feedback_banner', 'get_feedback_banner');