<?php while (have_posts()) : the_post(); ?>
	<article <?php post_class(); ?>>
		<div class="page-header"><h1 class="entry-title"><?php the_title(); ?></h1></div>
			<?php the_field('description'); ?>
			<hr>
	<?php if( have_rows('files') ): ?>
		<div class="col-sm-<?php if(have_rows('links')): ?>6<?php else: ?>12<?php endif; ?>">
			<h4>Documents</h4>
				<ul>
				<?php while ( have_rows('files') ) : the_row(); ?>
          <?php if(get_sub_field('file')): ?>
            <li class="doc-list">
              <a href="<?= get_sub_field('file'); ?>"><?= get_sub_field('title'); ?></a>
              <span class="file-meta"><?= attachment_file_meta(get_attachment_id_from_url(get_sub_field('file'))) ?></span>
              <span class="file-desc"><?php the_sub_field('description'); ?></span>
            </li>
          <?php endif; ?>
				<?php endwhile; ?>
				</ul>
		</div>
	<?php endif; ?>
	<?php if( have_rows('links') ): ?>
		<div class="col-sm-<?php if(have_rows('files')): ?>6<?php else: ?>12<?php endif; ?>">
			<h4>Links</h4>
				<ul>
				<?php while ( have_rows('links') ) : the_row(); ?>
				<li class="doc-list"><a href="<?= get_sub_field('link') ?>"><?= get_sub_field('title') ?></a><span class="file-desc"><?php the_sub_field('description'); ?></span></li>
				<?php endwhile; ?>
				</ul>
		</div>
	<?php endif; ?>
	</article>

<?php endwhile; ?>
