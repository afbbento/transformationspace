<?php
/**
 * The front page template file
 *
 * If the user has selected a static page for their homepage, this is what will
 * appear.
 * Learn more: https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

<div class="header-section" style="background-image:url('<?php echo get_field('header_background');  ?>');">
	<div class="home-slider-container">
		<div class="container">
			<div class="row visible-xs visible-sm">
				<div class="col-md-12">
		      	<?php 

		      		if ( has_custom_logo() ) {        
		        		echo '<a href="/"><div class="custom-logo"></div></a>';
					}
		      	?>
		      	</div>
	      	</div>
			<div class="row">
				<div class="col-md-12">
				<div class="slick-nav col-xs-1 hidden-xs"></div>
				<div class="home-slider">
					<?php

						
						if( have_rows('header_slider') ):

						
						while ( have_rows('header_slider') ) : the_row();

						?>
				    	<div>
				    	
				    		<div class="row">
				    			<div class="col-md-6 home-slider-left">
				    				<p class="sup-title"><?php the_sub_field('lead'); ?></p>
				    				<h1><?php the_sub_field('title'); ?></h1>
									<p><?php the_sub_field('paragraph'); ?></p>
									<div class="button-wrapper hidden-xs hidden-sm">
									  <div class="button"><?php pll_e('Explore our Bootcamps'); ?></div>
									</div>
				    			</div>
				    			<div class="col-md-6">
				    				<div class="slider-image">
				    					<div class="frame">
				    						<img src="<?php the_sub_field('image'); ?>">
				    					</div>
				    				</div>
				    				<div class="button-wrapper visible-xs visible-sm">
									  <div class="button"><?php pll_e('Explore our Bootcamps'); ?></div>
									</div>
				    			</div>
				    		</div>
				    		
						
					</div>
					<?php
						endwhile;
					else :
					    // no rows found

					endif;

					?>
				</div>
			</div>
			</div>
		</div>
	 </div>
	 <div class="header-section-bottom">
	 		<div class="container">
	 			<div class="row">
	 				<?php 
						$posts = get_posts(array(
							'posts_per_page'	=> 1,
							'post_type'			=> 'post',
							'orderby'        => 'rand',
							'category' => 14
						));
						if( $posts ):
							foreach( $posts as $post ): 
		
								setup_postdata( $post );
						?>

		    		<div class="col-md-6 col-sm-12 col-xs-12 row-highlight">	
		    			<div class="highlight-text">
							<div class="lead3 white-text">
								<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
							</div>
							<?php 
								$bootcamp_description = get_field('bootcamp_description');	
								if( $bootcamp_description ):
							?>
							<p><?php echo create_excerpt($bootcamp_description['text'], 122); ?></p>
	 					</div>
	 					<?php
	 						$imgid = get_field('homepage_video');

	 					?>
	 					<div class="highlight-image">
	 						<img src="<?php echo get_field('featured_video_cover'); ?>">
	 						<div class="play-button-outer">	 						
								<a data-fancybox data-width="640" data-height="360" href="https://vimeo.com/<?php echo $imgid; ?>">					
								  	<div class="play-button"></div>
								</a>
							</div>		
	 					</div>
	 				</div>
	 				<?php endif; ?>														
						<?php endforeach; ?>														
										
										<?php wp_reset_postdata(); ?>

						<?php endif; ?> 
	 				<div class="col-md-6 col-sm-12 col-xs-12">
	 					<div class="lead2">
						<?php pll('Looking for the right career move?'); ?>
						 </div>
	 					<label><?php pll('Enter your email'); ?></label>
	 					<form action="https://space.us19.list-manage.com/subscribe/post-json?u=f8fa948d2036f4f4fef049cfc&id=7aa7fb0215&c=?" method="get" id="newsletter-header" name="mc-embedded-subscribe-form" class="form-inline validate form-newsletter newsletter-header" target="_blank">	  				  
					    	<input id="mce-EMAIL" name="EMAIL" type="email" required="" placeholder="<?php pll_e('Your e-mail here'); ?>" > 
					    	<input class="btn btn-big btn-black submit" name="subscribe" type="submit" value="
					    	
					    	<?php pll_e('Get started'); ?>">
					    	<div id="mce-responses" class="clear">
								<p class="response"></p>
							</div>
						</form>
						<script>
						jQuery(document).ready( function () {
							var $form = jQuery('.newsletter-header');

						  if ( $form.length > 0 ) {
						    jQuery('.newsletter-header input[type=submit]').bind('click', function ( event ){
						      if (event) event.preventDefault()
						        register($form)
						    });
						  }
						});
						</script>
	 				</div>
	 			</div>
	 		</div>
	 </div>

</div><!-- #primary -->
<script type="text/javascript">
jQuery(document).ready(function(){
  	jQuery('.home-slider').slick({
     	infinite: true,
	    autoplaySpeed: 1500,
	    dots: true,
	    speed: 500,
	    fade: true,
	    arrows: false,
	    cssEase: 'linear',
	    appendDots:jQuery(".slick-nav"),
	    customPaging: function(slider, i) {
	      return jQuery('<button class="black-dots" type="button" />').text(i + 1);
	    }
  });
});
</script>
<?php
	get_template_part( 'template-parts/transformation_space/section-about');
?>

<?php
$quote_1 = get_field('quote_1');
if( $quote_1 ):
?>
<section class="quote">
	<div class="container">
		<div class="row">
	 	  	<div class="col-md-8 col-md-offset-2">
		  		<div clas="quote-container">
	  				<div class="quote-top"></div>
	 				<div class="quote-text"><?php echo $quote_1['quote']; ?></div>
	 				<div class="quote-author"><?php echo $quote_1['quote_author']; ?></div>
	 				<div class="quote-bottom"></div>
	   			</div>
	 		</div>
		</div>
	</div>
</section>
<?php endif; ?>

<?php
$bootcamps_section = get_field('bootcamps_section');
if( $bootcamps_section ):
?>
<div class="separator">
	<div class="line"></div>
	<div class="button-container">
		<button class="btn btn-black btn-large btn-shadow"><?php echo $bootcamps_section['title']; ?></button>
	</div>
	<div class="container">
		<div class="row">
	 	   	<div class="col-md-7 col-md-offset-3">
				<p><?php echo $bootcamps_section['paragraph']; ?></p>
			</div>
		</div>
	</div>
</div>
<?php endif; ?>

<section class="bootcamps">
	<div class="container">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<?php
					get_template_part( 'template-parts/transformation_space/bootcamp-box');
				?>
			</div>
		</div>
	</div>
</section>


<?php
//$education_section = get_field('education_section');
if( $education_section ):
?>
<div class="separator">
	<div class="line"></div>
	<div class="button-container">
		<button class="btn btn-black btn-large btn-shadow"><?php echo $education_section['title']; ?></button>
	</div>
	<div class="container">
		<div class="row">
	 	   	<div class="col-md-7 col-md-offset-3">
				<p><?php echo $education_section['paragraph']; ?></p>
			</div>
		</div>
	</div>
</div>
<?php endif; ?>

<?php 
	if( !have_rows('education_items') ):
?>
<section class="education" style="background-image: url('wp-content/themes/transformationspace/images/homepage-education-section.jpg');">
	<div class="container">
		<div class="row">
			<?php
		
					while ( have_rows('education_items') ) : the_row();    
					    
					echo '<div class="col-md-6">
				 	   		<div class="education-item">
					 	   		<img src="'.get_sub_field('image').'">
					 	   		<div class="inner-content white-text">
						 	   			<h1>'.get_sub_field('title').'</h1>
						 	   			<p>'.get_sub_field('text').'</p>
						 	   		</div>
						 	   			<ul class="social-links center">';
						 	   			
										if (!get_sub_field('fb')){
											echo '<li><a target="_blank" href="'.get_sub_field('fb').'" class="white-text"><i class="fab fa-facebook-f"></i></a></li>';
										}
										if (!get_sub_field('linkedin')){
											echo '<li><a target="_blank" href="'.get_sub_field('linkedin').'" class="white-text"><i class="fab fa-linkedin-in"></i></a></li>';
										}
										if (!get_sub_field('twitter')){
											echo '<li><a target="_blank" href="'.get_sub_field('twitter').'" class="white-text"><i class="fab fa-twitter"></i></a></li>';
										}
											
					echo '				</ul>
						 	   		<a href="#" class="btn btn-transparent full-width">know more</a>
						 	   	
					 	   	</div>
				 	   	</div>';					    
					endwhile; 
					?>
	 	</div>
	 	<div class="row">
	 		<div class="col-md-12 text-center">
	 			<a href="#" class="btn btn-yellow bordered">see all oportunities</a>
	 		</div>
	 	</div>
	</div>
</section>
<?php endif; ?>
<?php

	get_template_part( 'template-parts/transformation_space/stories');

?>

<?php
$blog_section = get_field('blog_section');
if( $blog_section ):
?>
<div class="separator">
	<div class="line"></div>
	<div class="button-container">
		<button class="btn btn-black btn-large btn-shadow"><?php echo $blog_section['title']; ?></button>
	</div>
	<div class="container">
		<div class="row">
	 	   	<div class="col-md-7 col-md-offset-3">
				<p><?php echo $blog_section['paragraph']; ?></p>
			</div>
		</div>
	</div>
</div>
<?php endif; ?>
<section class="blog">
	<div class="container">
		<?php

			get_template_part( 'template-parts/transformation_space/article-slider');
		?>
	</div>
</section>

<?php

	get_template_part( 'template-parts/transformation_space/text-slider');
?>

<?php
	$banner_color = 'yellow';
	include(locate_template('template-parts/transformation_space/more-info-banner.php'));
?>

<?php
	get_template_part( 'template-parts/transformation_space/events');
?>

<?php get_footer();
