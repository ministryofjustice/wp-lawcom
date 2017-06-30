

<div class="home-news-img-wrapper">

		<?php
$get_description = get_post(get_post_thumbnail_id())->post_excerpt;
the_post_thumbnail('large');
  if(!empty($get_description)){//If description is not empty show the div
  echo '<div class="img-caption">' . get_post(get_post_thumbnail_id())->post_excerpt . '</div>';
  }
?>

</div>

		<?php the_content(); ?>

    <hr>


		<?php
    $type = $post->post_name;
    $args=array(
      'post_type' => 'post',
      'post_status' => 'publish',
      'post_type'    => 'lecture',
      'type' => $type,
      'order'   => 'DESC',
      'orderby'   => 'meta_value_num',
      'meta_key'  => 'date',
      'posts_per_page' => -1
      );
    $my_query = null;
    $my_query = new WP_Query($args);
    if( $my_query->have_posts() ) {
      while ($my_query->have_posts()) : $my_query->the_post(); ?>
      <div class="post-summary">
      <h3><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
      <p><?php the_excerpt(); ?></p>
      </div>
       <?php
      endwhile;
    }
wp_reset_query();  // Restore global post data stomped by the_post().
?>



