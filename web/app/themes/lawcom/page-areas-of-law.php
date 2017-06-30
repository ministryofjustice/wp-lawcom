
<?php
/*
Template Name: Areas of law
*/
?>


<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('templates/page', 'header'); ?>
  <?php get_template_part('templates/content', 'areas-of-law'); ?>
<?php endwhile; ?>
