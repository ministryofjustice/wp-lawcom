<article <?php post_class('entry'); ?>>
  <header>
    <h2 class="entry-title">
      <a href="<?php the_permalink(); ?>">
        <?php

        if (is_search() && get_post_type() == 'project') {
          echo 'Project: ';
        }

        the_title();

        ?>
      </a>
    </h2>
    <?php if (get_post_type() !== 'project'): ?>
      <p><?php get_template_part('templates/entry-meta'); ?></p>
    <?php endif; ?>
  </header>

  <?php if ( has_post_thumbnail() ) : ?>
    <div class="entry-thumbnail">
      <?php the_post_thumbnail(); ?>
    </div>
  <?php endif; ?>

  <div class="entry-summary">
    <?php the_excerpt(); ?>
  </div>

  <div class="clearfix"></div>
</article>
