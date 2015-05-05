<?php while (have_posts()) : the_post(); ?>

<article <?php post_class(); ?>>
  <div class="page-header"><h1 class="entry-title"><?php the_title(); ?></h1></div>

  <?php the_field('description'); ?>

  <hr>

	<?php

	if( have_rows('files') ):

	    while ( have_rows('files') ) : the_row();

	        echo '<div class="doc-list"><h4><a href="' . get_sub_field('file') . '">' . get_sub_field('title') . '</a></h4>';
			echo '<p>' . the_sub_field('description') . '</p></div>'; 

	    endwhile;

	else :


	endif;

	?>



</article>

<?php endwhile; ?>