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
    <h3><a class="doc-list" href="/project/<?= $project->post_name; ?>/#<?= $post->post_name; ?>">Project: <?= $project->title; ?> | Publication: <?= $post->title; ?></a></h3>
    <?php $date = DateTime::createFromFormat('Y-m-d', get_field('publication_date')); ?>
    <?php if (!empty($date)): ?>

      <p><strong>Publication date:</strong> <?php echo $date->format('j F Y') ?></p>

      <?php endif; ?>
      <hr>
  <?php endif; ?>
<?php endwhile; ?>
<?php endif; ?>

<div class="pagination">
<?php echo paginate_links(); ?>
</div>

<?php
if(!empty($temp)) {
  $wp_query = null; $wp_query = $temp;
}
wp_reset_query();
?>
