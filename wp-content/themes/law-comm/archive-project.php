<?php get_template_part('templates/page', 'header'); ?>

<?php

$wp_query = project_query();

if ($wp_query->have_posts()) {
  while ($wp_query->have_posts()) {
    $wp_query->the_post();
    get_template_part('templates/content', get_post_format());
  }
}
else {
  ?>
  <div class="alert alert-warning">
    <?php _e('Sorry, no projects were found.', 'roots'); ?>
  </div>
  <p>Please try adjusting your search parameters and try again.</p>
  <?php
}

?>

<div class="pagination">
<?php echo paginate_links(array('show_all' => true)); ?>
</div>

<?php wp_reset_query(); ?>

