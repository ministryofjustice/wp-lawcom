
<?php
/*
Template Name: Homepage
*/
?>


<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part( 'header'); ?>
	
	
	  	<div id="top-banner" class="container-fluid">

		  	<div class="row">
		      <div class="col-sm-6 intro-left">
		      	<h2><?php the_field('welcome_title'); ?></h2>
		        	<p><?php the_field('welcome_text'); ?></p>
			        	<ul>
				        	<li><span><?php the_field('aims_item_1'); ?></span></li>
				        	<li><span><?php the_field('aims_item_2'); ?></li>
				        	<li><span><?php the_field('aims_item_3'); ?></span></li>
				        	<li><span><?php the_field('aims_item_4'); ?></span></li>
			        	</ul>
		      </div>
		      <div class="col-sm-6 intro-right">

		      <img src="<?php bloginfo('template_directory'); ?>/assets/img/intro-home.jpg"/>

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
						'category' => 'press-release',
						'posts_per_page' => 5);
					
					$latest_news_query = new WP_Query( $latest_news_args );
					// Iterate over entries and display
					while ( $latest_news_query->have_posts() ) : $latest_news_query->the_post();
						?>


							<li>
								<div class="news-details">

									<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

										<div class="news-meta">
											<time class="published" datetime="<?php echo get_the_time( 'c' ); ?>"><?php echo get_the_date(); ?></time>
										</div>



										<?php if ( has_post_thumbnail() ) : ?>
											<div class="home-news-img-wrapper">
												<?php the_post_thumbnail('large'); ?>
											</div>

										<?php endif; ?>
										<?php the_excerpt(); ?>
								
							
							</div>
							</li>
						

						<?php endwhile; ?>

				</ul>

				<div class="all-news">
					<a href="<?php bloginfo('site_url'); ?>/news/" class= "float-right em-link">All news ></a>
				</div>
				
			</div>

  		</div>

</div>
<?php endwhile; ?>
