<?php
/*
Template Name: Stories
Template Post Type: page
*/
get_header(); 
?>
<header class="blog-header">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="breadcrumbs">
					<span class="level0"><span class="circle-line"></span>stories </span>
				</div>				
			</div>
		</div>
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<dir class="row title">
					<div class="col-md-7">
						<h1>see what we are 
								talking about</h1>

						<nav class="social-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Footer Social Links Menu', 'transformationspace' ); ?>">
							<?php
								wp_nav_menu( array(
									'theme_location' => 'social',
									'menu_class'     => 'social-links-menu',
									'depth'          => 1,
									'link_before'    => '<span class="screen-reader-text">',
									'link_after'     => '</span>' . transformationspace_get_svg( array( 'icon' => 'chain' ) ),
								) );
							?>
						</nav><!-- .social-navigation -->
						
					</div>	
					<div class="col-md-5 newsletter">
						<p class="normal bold">Get fresh news, always!</p>
						<p>Receive all our articles and know more about related themes.</p>
						<div id="mc_embed_signup">
							<form action="https://space.us19.list-manage.com/subscribe/post-json?u=f8fa948d2036f4f4fef049cfc&id=7aa7fb0215&c=?" method="get" id="newsletter-blog" name="mc-embedded-subscribe-form" class="form-inline validate newsletter-sidebar newsletter-blog" target="_blank">	
								<div class="input-container">
									<input id="mce-EMAIL" class="big" name="EMAIL" required="" type="email" placeholder="Your e-mail address">
									<input class="btn btn-big btn-shadow submit" name="subscribe" type="submit" value="Go!">
								</div>				
								<div id="mce-responses" class="clear">
									<p class="response"></p>
								</div>			
							</form>						
						</div>
					</div>	
				</dir>
				<div class="row">
					<div class="col-md-12">
						<form class="search" action="/" method="get">				  
					   		<input class="borderless-input" type="text" name="s" id="search" placeholder="Search" value="">
					   	 	<input type="image" alt="Search" src="<?php bloginfo('template_url'); ?>/assets/images/search.png">
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</header>

<section class="bootcamps-stories">
	<div class="container">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<?php 
		         		$args = array(
						    'post_type' => 'Bootcamps'						    
						);
						// query
						$the_query = new WP_Query( $args );
					 if( $the_query->have_posts() ): 
						 while( $the_query->have_posts() ) : $the_query->the_post(); 
			
						 $desc = get_field('bootcamp_description');	
		         	?>

				<div class="bootcamp-stories-item <?php the_field('bootcamp_style_color'); ?>">
					<div class="row align-vertical">
						<div class="col-md-5 col-sm-12">
							<h2><?php the_title(); ?></h2>
						</div>
						<div class="col-md-5 col-sm-12">
							<p>
								<?php echo create_excerpt($desc['text'], 150); ?>					
							</p>
						</div>
						<div class="col-md-2">
							<div class="button-container">
								<a href="#" class="btn btn-white btn-shadow button-stories">see stories
									<span class="Button__textWrapper">
										<span class="Button__icon" aria-hidden="true">
											close
											<span class="Button__icon__close"></span>
										</span>
									</span>
								</a>
							</div>
						</div>
					</div>
				</div>

				<div class="bootcamp-stories-ajax" style="display:none;">
					<div class="all-stories bootcamp-stories">
							<div class="row">
        						<div class="col-md-12">
        							<div class="row">  
					<?php
						
						$stories = get_posts(array(							
							'meta_query' => array(
								array(
									'key' => 'related_bootcamp', // name of custom field
									'value' => '"' . get_the_ID() . '"', // matches exactly "123", not just 123. This prevents a match for "1234"
									'compare' => 'LIKE'
								)
							)
						));

				 		if( $stories ): 
					 
						$i = 0;
						foreach( $stories as $story ): 

						$post_title = $story->post_title;
						$text = get_field('text', $story->ID);
						$video_ID = get_field('vimeo_video_id', $story->ID);
						$video_cover = get_field('video_cover', $story->ID); 
						$post_date = $story->post_date;
					
					?>
						<?php if ($i==0){ ?>
						<div class="col-md-8 featured">
		                    <div class="video-container">
		                        <div class="play-button-outer big">
		                           <a data-fancybox="" data-width="640" data-height="360" href="https://vimeo.com/<?php echo $video_ID; ?>">
		                              <div class="play-button"></div>
		                           </a>
		                        </div>
		                        <img src="<?php echo $video_cover; ?>" >				
		                     </div>
		                     <p class="small extra-bold"><?php echo $post_title; ?></p>
		                      <div class="post-meta">
					 				<p class="x-small"><span class="time"><?php echo vimeoVideoDuration($video_ID); ?></span>
					 				</p>
					 			</div>	
		                  </div>
						<?php } ?>
						<?php if ($i==1){ ?>

							<div class="col-md-4 story-item story-item-right">
		                     <div class="story-video">
		                        <div class="video-container">
		                           <div class="play-button-outer small">
		                              <a data-fancybox="" data-width="640" data-height="360" href="https://vimeo.com/<?php echo $video_ID; ?>">
		                                 <div class="play-button"></div>
		                              </a>
		                           </div>
		                           <img src="<?php echo $video_cover; ?>" >				
		                        </div>                      
		                     </div>
		                     <div class="text">
		                        <p class="x-small title"><span><?php echo $post_title; ?></span><span class="time"><?php echo vimeoVideoDuration($video_ID); ?></span></p>
		                        <p class="x-small"><?php echo $text; ?></p>
		                        <div class="post-meta">
					 				<p class="x-small"><?php echo transformation_time_link($story->ID); ?>
					 				</p>
					 			</div>	
		                     </div>
		                  </div>
						
						<?php } ?>

						<?php if ($i>1){ ?>

							</div>
            				<div class="row bootcamp-item-stories">
								<div class="col-md-4 story-item">
						 			<div class="story-video">
						 				<div class="video-container">
											<div class="play-button-outer small">
												<a data-fancybox="" data-width="640" data-height="360" href="https://vimeo.com/<?php echo $video_ID; ?>">
											  		<div class="play-button"></div>
												</a>
											</div>
										  	<img src="<?php echo $video_cover; ?>" >				
										</div>	
							 		</div>
							 		<div class="text">
							 			<p class="x-small title">
											<span><?php echo $post_title; ?></span>
						 				</p>
						 				<span class="time"><?php echo vimeoVideoDuration($video_ID); ?></span>
						 			</div>		 		
							 	</div>
						<?php } ?>
						

						<?php $i++; endforeach; ?>
							
						<?php endif; ?>

							</div>
						</div>
					</div>
				</div>
				</div>
				 <?php 
					endwhile;
					wp_reset_query(); 
					endif; 
				?>


					
			</div>
		</div>
	</div>
</section>
<script type="text/javascript">
jQuery(".get-stories").click(function(event){
	 console.log( 'btn' );
	event.preventDefault();
	var id_post = 5;
	jQuery.ajax({
        type: 'POST',
        url: '<?php echo admin_url('admin-ajax.php');?>',
        dataType: 'html', 
        data: { 
        	post_id: id_post,
        	action : 'get_ajax_posts' 
        },
        success: function( response ) {
            //console.log( response );

            jQuery( '.bootcamp-stories-ajax' ).html( response ); 
        },
        error : function (jqXHR, textStatus, errorThrown) {
				//$loader.html($.parseJSON(jqXHR.responseText) + ' :: ' + textStatus + ' :: ' + errorThrown);
				console.log(jqXHR);
			}
    });
});
</script>

<section class="stories">
	<div class="container all-stories">
		<div class="row feat-video">
		   <div class="col-md-10 col-md-offset-1">
		      <div class="col-md-12">
		         <div class="bordered-box lined-box">
		         	<?php 
		         		$args = array(
						    'category_name' => 'Stories',
						    'posts_per_page'   => 1,
						);
						// query
						$the_query = new WP_Query( $args );
					 if( $the_query->have_posts() ): 
						 while( $the_query->have_posts() ) : $the_query->the_post(); 
						 $video_ID = get_field('vimeo_video_id');
		         	?>
		            <div class="row">
		               <div class="col-md-8">
		                  <div class="video-container">
		                     <div class="play-button-outer">
		                        <a data-fancybox="" data-width="640" data-height="360" href="https://vimeo.com/<?php the_field('vimeo_video_id'); ?>">
		                           <div class="play-button"></div>
		                        </a>
		                     </div>
		                     <img src="<?php the_field('video_cover'); ?>">				
		                  </div>
		               </div>
		               <div class="col-md-4 text">
		                  <h1><?php the_title(); ?>
		                  </h1>
		                  
		                  <div class="post-meta"><?php echo transformationspace_posted_on(); ?></div>
		                  <p class="small"><?php the_field('text'); ?></p>
		               </div>
		            </div>
		            <?php 
						endwhile;
						wp_reset_query(); 
						endif; ?>
		         </div>
		      </div>
		   </div>
		</div>
	 <div class="lead1 text-center">more stories</div>
	 <div class="row more-stories">
	 	<div class="col-md-10 col-md-offset-1">
	 		<?php 
	      		$args = array(
				    'category_name' => 'Stories',
				    'offset'        => 1,
					);
					// query
					$the_query = new WP_Query( $args );
					 if( $the_query->have_posts() ): 
						while( $the_query->have_posts() ) : $the_query->the_post(); 
						
						$video_ID = get_field('vimeo_video_id');
		    ?>
		 	<div class="col-md-4 story-item">
		 		<div class="story-video">
		 			<div class="video-container">
						<div class="play-button-outer">
							<a data-fancybox="" data-width="640" data-height="360" href="https://vimeo.com/<?php the_field('vimeo_video_id'); ?>">
						 		<div class="play-button"></div>
							</a>
						</div>
					  	<img src="<?php the_field('video_cover'); ?>" >				
					</div>		
		 		</div>
		 		<div class="text">
		 			<p class="x-small title">
		 				<span><?php the_title(); ?></span>
		 				<span class="time"><?php echo vimeoVideoDuration($video_ID); ?></span>
		 			</p>
		 			<p class="x-small"><?php the_field('text'); ?></p>
		 		</div>
		 		<div class="post-meta">
		 			<p class="x-small"><?php echo transformationspace_posted_on(); ?></p>
		 		</div>		 		
		 	</div>

		 	<?php 
					endwhile;
				wp_reset_query(); 
			endif; 
			?>
	 	</div>
	</div>
	</div>
</section>
<?php get_footer(); ?>
