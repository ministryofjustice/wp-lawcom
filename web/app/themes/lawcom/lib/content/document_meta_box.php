<?php

function newDocumentMetaBox()
{
  return new documentMetaBox();
}

if (is_admin() && isset($_GET['post'])) {
  add_action('load-post.php', 'newDocumentMetaBox');
  add_action('load-post-new.php', 'newDocumentMetaBox');
}

/**
 * The Class.
 */
class documentMetaBox
{

  /**
   * Hook into the appropriate actions when the class is constructed.
   */
  public function __construct()
  {
    add_action('add_meta_boxes', array($this, 'add_meta_box'));
    add_action('save_post', array($this, 'save'));
  }

  /**
   * Adds the meta box container.
   */
  public function add_meta_box($post_type)
  {
    $post_types = array('document', 'project');

    if (in_array($post_type, $post_types)) {
      add_meta_box(
        'project_finder',
        __('Project / Document Finder', 'roots'),
        array($this, 'render_meta_box_content'),
        $post_type,
        'side',
        'high'
      );
    }
  }

  /**
   * Save the meta when the post is saved.
   *
   * @param int $post_id The ID of the post being saved.
   */
  public function save($post_id)
  {
    // This only outputs content
  }


  /**
   * Render Meta Box content.
   *
   * @param WP_Post $post The post object.
   */
  public function render_meta_box_content($post)
  {
    $post_type = get_post_type();
    $query_id = $post->ID;
    if ($post_type == 'document') {
      $project = get_field('field_54d37be93594e', $post->ID);
      if (!empty($project)) {
        echo '<p><strong>Project:</strong> <a href="' . get_edit_post_link($project->ID) . '">' . get_the_title($project->ID) . '</a></p>';
        $other_id = $query_id = $project->ID;
      }
    }

    $args = array(
      'post_type' => 'document',
      'posts_per_page' => -1,
      'meta_query' => array(
        array(
          'key' => 'project',
          'value' => $query_id,
        ),
      ),
    );


    $documents = get_posts($args);

    if (!empty($documents)) {
      if (!empty($other_id)) {
        echo '<strong>Other documents for this project:</strong><ul>';
      } else {
        echo '<strong>Documents for this project:</strong><ul>';
      }

      foreach ($documents as $document) {
        echo '<li><a href="' . get_edit_post_link($document->ID) . '">' . get_the_title($document->ID) . '</a></li>';
      }
      echo '</ul>';
    }
  }
}
