<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part( 'header'); ?>
	
	
	  	<div id="top-banner" class="container-fluid">

		  	<div class="row">
		      <div class="col-sm-6 intro-left">
		      	<h2>Welcome to the official website of the Law Commission</h2>
		        	<p>The Law Commission is the statutory independent body created by the Law Commissions Act 1965 to keep the law under review and to recommend reform where it is needed. The aim of the Commission is to ensure that the law is:</p>
			        	<ul>
				        	<li><span>fair</span></li>
				        	<li><span>modern</span></li>
				        	<li><span>simple</span></li>
				        	<li><span>effective</span></li>
			        	</ul>
		      </div>
		      <div class="col-sm-6 intro-right">

		      <img src="<?php bloginfo('template_directory'); ?>/assets/img/intro-home.jpg"/>

		      </div>
	    	</div>

	  	</div>

  	<div class="row">
   		<div class="col-sm-4 min-col">
			<div class="quick-links side-item">
			<h2>Quick links</h2>
  				<ul>
  					<li class="ql1"><a href="<?php echo get_permalink( get_post_meta( $post->ID, "quick-link-1-page", true )); ?>"><?php echo get_post_meta( $post->ID, "quick-link-1", true ); ?> ><p><span>Search to find a publication</span></p></a></li>
  					<li class="ql2"><a href="<?php echo get_permalink( get_post_meta( $post->ID, "quick-link-2-page", true )); ?>"><?php echo get_post_meta( $post->ID, "quick-link-2", true ); ?> ><p><span>Search to find a consultation</span></p></a></li>
  					<li class="ql3"><a href="<?php echo get_permalink( get_post_meta( $post->ID, "quick-link-3-page", true )); ?>"><?php echo get_post_meta( $post->ID, "quick-link-3", true ); ?> ><p><span>Search to find a project</span></p></a></li>
  				</ul>
  			</div>

   			<div class="twitter side-item">
  				<h3>Twitter</h3>
  				<a class="twitter-timeline" href="https://twitter.com/Law_Commission" data-widget-id="561108239270809601">Tweets by @Law_Commission</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
  		
  				
  			</div>

 			<div class="media side-item video-container">
				<h2>Latest media</h2>
					<div class="videoWrapper">
					 	<iframe width="640" height="360" src="//www.youtube.com/embed/XtpwSW_2K8Y" frameborder="0" allowfullscreen></iframe> 
					 </div>
			</div>

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
				
			<a href="<?php bloginfo('site_url'); ?>/news/" class= "float-right em-link">All news ></a>

			</div>

  		</div>

</div>
<?php endwhile; ?>
