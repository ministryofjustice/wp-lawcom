<?php
/**
 * Template name: Implementation Table
 */
?>

<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('templates/page', 'header'); ?>
  <?php get_template_part('templates/content', 'page'); ?>
  <?php get_template_part('templates/implementation-table'); ?>
<?php endwhile; ?>
