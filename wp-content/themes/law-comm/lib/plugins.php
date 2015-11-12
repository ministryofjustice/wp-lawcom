<?php

/**
 * Register the required plugins for this theme.
 */

require 'classes/class-tgm-plugin-activation.php';

add_action('tgmpa_register', 'theme_register_required_plugins');
function theme_register_required_plugins() {
  /*
   * Array of plugin arrays. Required keys are name and slug.
   * If the source is NOT from the .org repo, then source is also required.
   */
  $plugins = array(

    array(
      'name'        => 'Advanced Custom Fields Pro',
      'slug'        => 'advanced-custom-fields-pro',
      'source'      => get_stylesheet_directory() . '/lib/plugins/advanced-custom-fields-pro.zip',
      'required'    => true,
    ),

    array(
      'name'        => 'Advanced Responsive Video Embedder',
      'slug'        => 'advanced-responsive-video-embedder',
      'required'    => true,
    ),

    array(
      'name'        => 'Safe Redirect Manager',
      'slug'        => 'safe-redirect-manager',
      'required'    => true,
    ),

    array(
      'name'        => 'TAO Schedule Update (edited)',
      'slug'        => 'tao-schedule-update-edited',
      'source'      => get_stylesheet_directory() . '/lib/plugins/tao-schedule-update-edited.zip',
      'required'    => true,
    ),

  );

  /*
   * Array of configuration settings.
   */
  $config = array(
    'id'           => 'tgmpa_theme',           // Unique ID for hashing notices for multiple instances of TGMPA.
    'default_path' => '',                      // Default absolute path to bundled plugins.
    'menu'         => 'tgmpa-install-plugins', // Menu slug.
    'parent_slug'  => 'themes.php',            // Parent menu slug.
    'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
    'has_notices'  => true,                    // Show admin notices or not.
    'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
    'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
    'is_automatic' => false,                   // Automatically activate plugins after installation or not.
    'message'      => '',                      // Message to output right before the plugins table.
  );

  tgmpa($plugins, $config);
}
