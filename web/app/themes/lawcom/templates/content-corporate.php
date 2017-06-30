

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

    $paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;

    $args=array(
      'post_type' => 'post',
      'post_status' => 'publish',
      'post_type'    => 'document',
      'posts_per_page' => 10,
      'paged' => $paged,
      'tax_query' => array(
        array(
          'taxonomy' => 'document_type',
          'field' => 'slug',
          'terms' => 'corporate'
        ),
      )
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
?>
    <div class="pagination">
<?php
$big = 999999999; // need an unlikely integer

echo paginate_links( array(
  'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
  'format' => '?paged=%#%',
  'current' => max( 1, get_query_var('paged') ),
  'total' => $my_query->max_num_pages
) );
?>
</div>
<?php wp_reset_query();  // Restore global post data stomped by the_post().
?>





