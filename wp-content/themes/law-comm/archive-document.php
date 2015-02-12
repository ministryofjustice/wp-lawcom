<?php get_template_part('templates/page', 'header'); ?>

<?php if (!have_posts()) : ?>
  <div class="alert alert-warning">
    <?php _e('Sorry, no results were found.', 'roots'); ?>
  </div>
  <?php get_search_form(); ?>
<?php endif; ?>

<?php 
  $wp_query = document_query(); 
  //p2p_type( 'projects_to_documents' )->each_connected( $wp_query );
?>
<?php if ( $wp_query->have_posts() ) : ?>
<?php while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
  <?php $project = get_field('project');  ?> 
  <?php if($project): ?>
    <a href="/project/<?= $project->post_name; ?>/#<?= $post->post_name; ?>">Project: <?= $project->title; ?> | Publication: <?= $post->title; ?></a><br />
  <?php endif; ?>
<?php endwhile; ?>
<?php endif; ?>


<?php if ($wp_query->max_num_pages > 1) : ?>
  <nav class="post-nav">
    <ul class="pager">
      <li class="previous"><?php next_posts_link(__('&larr; Older posts', 'roots')); ?></li>
      <li class="next"><?php previous_posts_link(__('Newer posts &rarr;', 'roots')); ?></li>
    </ul>
  </nav>
<?php endif; ?>
<?php $wp_query = null; $wp_query = $temp; wp_reset_query(); ?>