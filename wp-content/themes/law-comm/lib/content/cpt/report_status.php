<?php

namespace Content\CPT;

class ReportStatus {
  /**
   * Class constructor
   * Setup action and filter bindings
   */
  public function __construct() {
    add_action('init', array($this, 'register'), 0);
    add_filter('manage_report_status_posts_columns' , array($this, 'manage_columns'));
    add_action('manage_report_status_posts_custom_column' , array($this, 'custom_columns'), 10, 2);
    add_filter('manage_edit-report_status_sortable_columns' , array($this, 'sortable_columns'));
    add_action('pre_get_posts' , array($this, 'pre_get_posts'));
    add_action('admin_head', array($this, 'admin_head'));
    add_action('admin_init', array($this, 'admin_init'));
  }

  /**
   * Register post type
   */
  function register() {
    $labels = array(
      'name'                => 'Implementation Table',
      'singular_name'       => 'Report Status',
      'menu_name'           => 'Implementation Table',
      'all_items'           => 'All Reports',
      'view_item'           => 'View Report',
      'add_new_item'        => 'Add Report to Grid',
      'add_new'             => 'Add New',
      'edit_item'           => 'Edit Report',
      'update_item'         => 'Update Report',
      'search_items'        => 'Search Reports',
      'not_found'           => 'No reports found.',
      'not_found_in_trash'  => 'No reports found in Bin.',
    );
    $args = array(
      'label'               => 'report_status',
      'description'         => 'Used to store individual projects',
      'labels'              => $labels,
      'supports'            => array( 'title' ),
      'taxonomies'          => array( ),
      'hierarchical'        => false,
      'public'              => false,
      'show_ui'             => true,
      'show_in_menu'        => true,
      'show_in_nav_menus'   => true,
      'show_in_admin_bar'   => true,
      'menu_position'       => 5,
      'menu_icon'           => 'dashicons-editor-table',
      'can_export'          => true,
      'has_archive'         => false,
      'exclude_from_search' => true,
      'publicly_queryable'  => false,
      'query_var'           => false,
      'rewrite'             => false,
    );

    register_post_type('report_status', $args);
  }

  /**
   * Add custom columns to admin table
   *
   * @param array $columns
   * @return array
   */
  function manage_columns($columns) {
    unset($columns['title']);
    unset($columns['date']);

    $columns = array_merge($columns, array(
      'reference' => 'LC No',
      'title' => 'Title',
      'status' => 'Status',
      'related_measures' => 'Related Measures',
    ));

    return $columns;
  }

  /**
   * Output content for custom column cell
   *
   * @param $column
   * @param $post_id
   */
  function custom_columns($column, $post_id) {
    switch ($column) {
      case 'book_author':
        $terms = get_the_term_list($post_id, 'book_author', '', ',', '');
        if (is_string($terms)) {
          echo $terms;
        } else {
          _e('Unable to get author(s)', 'your_text_domain');
        }
        break;

      case 'reference':
        the_field('reference', $post_id);
        break;

      case 'status':
        echo self::get_status($post_id);
        break;

      case 'related_measures':
        the_field('related_measures', $post_id);
        break;
    }
  }

  public function sortable_columns($columns) {
    $columns['reference'] = 'reference';
    $columns['status'] = 'status';
    return $columns;
  }

  function pre_get_posts($query) {
    /**
     * We only want our code to run in the main WP query
     * AND if an orderby query variable is designated.
     */
    if ($query->get('post_type') == 'report_status' && $query->is_main_query()) {
      $orderby = $query->get('orderby');

      if (empty($orderby)) {
        $orderby = 'reference';
      }

      switch($orderby) {
        case 'reference':
          $query->set('meta_key', 'reference');
          $query->set('orderby', 'meta_value_num');
          break;

        case 'status':
          $query->set('meta_key', 'status');
          $query->set('orderby', 'meta_value');
          break;
      }
    }
  }

  function admin_init() {
    global $typenow;

    if (isset($typenow) && $typenow == 'report_status') {
      add_filter('months_dropdown_results', '__return_empty_array');
    }
  }

  /**
   * Change custom column widths
   */
  function admin_head() {
    echo '<style type="text/css">';
    echo '.column-reference { width:80px; }';
    echo '</style>';
  }

  /**
   * @param int $post_id
   * @return string
   */
  public static function get_status($post_id) {
    $status = get_field('status', $post_id);
    if ($status == 'Other') {
      $status = get_field('other_status', $post_id);
    }
    return $status;
  }
}

$ReportStatus = new ReportStatus();

