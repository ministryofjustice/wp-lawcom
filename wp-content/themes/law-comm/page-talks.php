
<?php
/*
Template Name: Lectures and talks
*/
?>


<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('templates/page', 'header'); ?>
  <?php get_template_part('templates/content', 'talks'); ?>
<?php endwhile; ?>
