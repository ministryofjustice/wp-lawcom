
<?php
/*
Template Name: Homepage
*/
?>

<?php while (have_posts()) : the_post(); ?>

	  	<div id="top-banner" class="container-fluid">

		  	<div class="row">
		      <div class="col-sm-6 intro-left">
		      	<h2><?php the_field('welcome_title'); ?></h2>
		        	<p><?php the_field('welcome_text'); ?></p>
			        	<ul>
				        	<li><span><?php the_field('aims_item_1'); ?></span></li>
				        	<li><span><?php the_field('aims_item_2'); ?></span></li>
				        	<li><span><?php the_field('aims_item_3'); ?></span></li>
				        	<li><span><?php the_field('aims_item_4'); ?></span></li>
			        	</ul>
		      </div>
		      <div class="col-sm-6 intro-right">

            <?php
            $link = get_field('featured_image_link');
            ?>

            <?php if (!empty($link)): ?>
              <a href="<?php echo esc_attr($link); ?>">
            <?php endif; ?>

		          <?php the_post_thumbnail( 'full' ); ?>

            <?php if (!empty($link)): ?>
              </a>
            <?php endif; ?>

		      </div>
	    	</div>

	  	</div>

  	<div class="row">
   		<div class="col-sm-4 min-col">
			  <?php include roots_sidebar_path(); ?>
		  </div>

  		<div class="col-sm-8 max-col">

			<div class="news main-item">

				<h2>Latest news</h2>
				<ul>

				<?php
					// Get meta value containing array of entries
					$latest_news_args = array(
						'post_type' => 'post',
						'cat' => 1,
						'posts_per_page' => 5);

					$latest_news_query = new WP_Query( $latest_news_args );
					// Iterate over entries and display
					while ( $latest_news_query->have_posts() ) : $latest_news_query->the_post();
						?>


							<li>
                <article <?php post_class('entry'); ?>>
                  <header>
                    <h3 class="entry-title">
                      <a href="<?php the_permalink(); ?>">
                        <?php

                        if (is_search() && get_post_type() == 'project') {
                          echo 'Project: ';
                        }

                        the_title();

                        ?>
                      </a>
                    </h3>
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

              </li>


						<?php endwhile; ?>

				</ul>

				<div class="all-news">
					<a href="<?php bloginfo('url'); ?>/category/news/" class= "float-right em-link">All news ></a>
				</div>

			</div>

  		</div>

</div>
<?php endwhile; ?>
