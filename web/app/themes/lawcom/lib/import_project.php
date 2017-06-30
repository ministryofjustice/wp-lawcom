<?php
/*include($_SERVER['DOCUMENT_ROOT'] . '/wp-load.php');
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);

$json = file_get_contents('https://s3-eu-west-1.amazonaws.com/uploads-eu.hipchat.com/35196/1676873/Z74uQXPWFKeZ6Jd/lawcommission_projects.json');

$press = json_decode($json, true);

foreach($press as $p) {
  $post = array(
    'post_title' => $p['post_title'],
    'post_content' => $p['post_content'],
    'post_status' => 'publish',
    'post_type' => 'project',
  );

  $post_id = wp_insert_post($post);
  update_post_meta( $post_id, 'title', $p['post_title'] );
  update_post_meta( $post_id, 'description', $p['post_content'] );

  update_field( 'field_54d493a7d8aed', $p['post_title'], $post_id );
  update_field( 'field_54d493acd8aee', $p['post_content'], $post_id );

}
