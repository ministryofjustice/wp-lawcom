<?php
/**
 * Clean up the_excerpt()
 */
function roots_excerpt_more($more) {
  return ' &hellip; <a href="' . get_permalink() . '">' . __('<span class="more-link">Read more ></span>', 'roots') . '</a>';
}
add_filter('excerpt_more', 'roots_excerpt_more');

/**
 * Manage output of wp_title()
 */
function roots_wp_title($title) {
  if (is_feed()) {
    return $title;
  }

  $title .= get_bloginfo('name');

  return $title;
}
add_filter('wp_title', 'roots_wp_title', 10);

function human_filesize($bytes, $dec = 0)
{
    $size   = array('B', 'kB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB');
    $factor = floor((strlen($bytes) - 1) / 3);

    return sprintf("%.{$dec}f", $bytes / pow(1024, $factor)) . @$size[$factor];
}

/**
 * Configure 'Safe Redirect Manager' plugin
 */
function lawcom_srm_restrict_to_capability() {
  return 'publish_posts';
}
add_filter('srm_restrict_to_capability', 'lawcom_srm_restrict_to_capability');

/**
 * Get an attachment ID given its URL
 *
 * @param string $image_src
 * @return int|false ID of the attachment, or false if not found
 */
function get_attachment_id_from_url($image_src) {
  global $wpdb;
  $query = $wpdb->prepare("SELECT ID FROM {$wpdb->posts} WHERE guid = %s", $image_src);
  $id = $wpdb->get_var($query);
  return ($id ? (int) $id : false);
}

/**
 * Return the file meta string for a given attachment.
 *
 * @param int $attachment_id ID of the attachment
 * @return string
 */
function attachment_file_meta($attachment_id) {
  $attachment_path = get_attached_file($attachment_id);

  if (!$attachment_path || !file_exists($attachment_path)) {
    return false;
  }

  $filesize = filesize($attachment_path);
  $filetype = wp_check_filetype($attachment_path)['ext'];
  return strtoupper($filetype) . ', ' . size_format($filesize);
}
