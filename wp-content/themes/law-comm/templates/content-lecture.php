<?php while (have_posts()) : the_post(); ?>
<?php $project_title = get_the_id(); ?>
<article <?php post_class(); ?>>
  <header><h1 class="entry-title"><?php the_title(); ?></h1></header>
  <div class="row">
    <div class="col-sm-8 max-col">
      <?php the_content( ); ?>
      <?php if (get_field('transcript')): ?>
        <h3><a href="<?= get_field('transcript'); ?>">Click here for the transcript</a></h3>
        
      <?php endif; ?>
      <?php if (get_field('video')): ?>
        <h2>Video</h2>
        <div class="videoWrapper">
          <?= _e( wp_oembed_get( get_field( 'video' ) ) ); ?>
        </div>
        <?= get_field('video_description'); ?>
      <?php endif; ?>
      <?php if (get_field('external_audio_/_video')): ?>
        <h2>External Audio / Video</h2>
        <a href="<?= get_field('external_audio_/_video'); ?>"><?= get_field('external_audio_/_video'); ?></a>
      <?php endif; ?>
    </div>

    <div class="col-sm-4 min-col">
      <div class="project-details">
        <h3>Lecture / Talk Details</h3>
        <?php $fields = get_the_terms($post->ID, 'type'); if(!empty($fields)): ?>
        <h4>Type</h4>
        <?php foreach($fields as $field): ?>
          <?= $field->name; ?>,
        <?php endforeach; ?>
        <?php endif; ?>

        <?php if($field = get_field('speaker')): ?>
        <h4>Speaker</h4>
        <p><?php the_field('speaker');  ?></p>
        <?php endif; ?>

        <?php if($field = get_field('date')): ?>
        <h4>Date</h4>
         <?php $date = DateTime::createFromFormat('Ymd', get_field('date')); ?>
         <?php if (!empty($date)): ?>
        <p><?php echo $date->format('j F Y') ?></p>
        <?php endif; ?>
        <?php endif; ?>

        <?php if($field = get_field('topic')): ?>
        <h4>Topic</h4>
        <p><?php the_field('topic');  ?></p>
        <?php endif; ?>
      </div>
    </div>
  </div>
</article>
<?php endwhile; ?>
