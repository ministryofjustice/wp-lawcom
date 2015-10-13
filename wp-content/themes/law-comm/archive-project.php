<?php get_template_part('templates/page', 'header'); ?>

<?php if (!have_posts()) : ?>
  <div class="alert alert-warning">
    <?php _e('Sorry, no results were found.', 'roots'); ?>
  </div>
  <?php get_search_form(); ?>
<?php endif; ?>

<?php $wp_query = project_query(); ?>
<?php if ( $wp_query->have_posts() ) : ?>
<?php while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
  <?php get_template_part('templates/content', get_post_format()); ?>
<?php endwhile; ?>
<?php endif; ?>

<div class="pagination">
<?php echo paginate_links(array('show_all' => true)); ?>
</div>

<?php
$wp_query = null;
if(isset($temp)) { $wp_query = $temp; }
wp_reset_query(); ?>
