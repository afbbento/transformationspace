<?php
/*
Template Name: About
Template Post Type: post, page, event
*/

get_header(); ?>

<div class="header-section" style="background-image:url('/wp-content/uploads/2018/10/bg-homepage.png');">
	<div class="home-slider-container">

		<div class="home-slider" id="about-slider">
		    <?php

				
				if( have_rows('header_slider') ):

				$rows_count = count(get_field('header_slider'));
				while ( have_rows('header_slider') ) : the_row();

					$title_ = explode(" ", get_sub_field('title'), 2);
        			$title  = '<span class="yellow-text">'.$title_[0].'</span> '.$title_[1];

				echo '
		    	<div>
		    	<div class="container">
		    		<div class="row">
		    			<div class="col-md-6 home-slider-left">
		    				<p class="lead1"><span class="circle-line white"></span><strong>about</strong></p>
		    				<h1>'.$title.'</h1>
							<p>'.get_sub_field('paragraph').'</p>
		    			</div>
		    			<div class="col-md-6">
		    				<div class="slider-image">';
		    				
		    					
		    				echo '<div class="frame">
		    						<div class="caption">
		    							<p><strong>'.get_sub_field('image_caption_bold').'</strong></p>
		    							<p class="x-small">'.get_sub_field('image_caption').'</p>
		    						</div>
		    						<img src="'.get_sub_field('image').'">
		    					</div>';
		    				
		    				if ($rows_count>1){
		    					echo '<div class="slider-nav">		    							
			    							<button class="prev"><img src="/wp-content/uploads/prev.png"></button>
											<p><span class="yellow-circle current-slide"></span></p>
											<button class="next"><img src="/wp-content/uploads/next.png"></button>								
									</div>';
		    				}

		    				echo '</div>
		    			</div>
		    		</div>
				</div>
			</div>';
				endwhile;
			else :
			    // no rows found

			endif;

			?>

		</div>
	 </div>
</div><!-- #primary -->
<script type="text/javascript">
/*About Slider*/
jQuery(document).ready(function(){
	
  jQuery('#about-slider').slick({
  	dots: false,
  	fade: true,
  	nextArrow: jQuery('.next'),
  	prevArrow: jQuery('.prev')
  });

  jQuery('.current-slide').text(1);
  	jQuery('#about-slider').on('afterChange', function(event, slick, currentSlide, nextSlide){
  		console.log(currentSlide);
  		jQuery('.current-slide').text(currentSlide+1);
	});
  });

</script>
<?php
	get_template_part( 'template-parts/transformation_space/section-about');
?>

<?php 
$transformation_content = get_field('transformation_section');	
if( $transformation_content ):
?>

<section class="transform">
	<div class="container">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<h1><?php echo $transformation_content['title']; ?><br><span class="blue"><?php echo $transformation_content['title_blue']; ?></span></h1>
				<p class="small"><?php echo $transformation_content['paragraph']; ?></p>
				<div class="image-container"><img src="<?php echo $transformation_content['image']; ?>"></div>
				<div class="row">
					<?php if( have_rows('transformation_columns') ): 
								while ( have_rows('transformation_columns') ) : the_row();
									if( get_row_layout() == 'column' ):
																
									echo '<div class="col-md-4">';
									echo '<p><strong>'.get_sub_field('title').'</strong></p>';
									echo '<p class="small">'.get_sub_field('text').'</p>';
									echo '</div>';							
									endif;
						    endwhile;
						else :
						    // no layouts found
						endif;
					?>
				</div>
			</div>
		</div>
	</div>
</section>
<?php endif; ?>
<?php
	get_template_part( 'template-parts/transformation_space/banner-slider');
?>
<section class="magic">
	<div class="container">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<h1><?php the_field('magic'); ?><br><span class="blue"><?php the_field('section_magic_blue'); ?></span></h1>
				<p class="small"><?php the_field('section_magic_text'); ?></p>
				<div class="row">
					<div class="col-sm-6 col-sm-offset-3 col-md-6 col-md-offset-3 col-lg-5 col-lg-offset-3">
						<?php
						if( have_rows('magic_rows') ):

						    while ( have_rows('magic_rows') ) : the_row();
					    
					    
						    if (get_sub_field('image-position')=='left:left'){
						    	echo '<div class="row-vector">					
									<div class="image-container pull-left">
										<img src="'.get_sub_field('image').'">
									</div>
									<div class="text">
										<div class="lead2">'.get_sub_field('title').'</div>
										<p class="small">'.get_sub_field('text').'</p>
									</div>
								</div>';
						    }else{
						    	echo '<div class="row-vector">					
									<div class="image-container pull-right">
										<img src="'.get_sub_field('image').'">
									</div>
									<div class="text">
										<div class="lead2">'.get_sub_field('title').'</div>
										<p class="small">'.get_sub_field('text').'</p>
									</div>
								</div>';
						    }
						    							    
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
</section>


<?php 
$image_banner = get_field('image_banner');	
if( $image_banner ):
?>
<div class="banner-image">
	<div class="row flex v-center">
		
	<div class="col-md-6 col-sm-12 visible-xs" style="margin-bottom: 40px; height: 300px;background-blend-mode: lighten;background-color: #4B5FF7;background-size: cover;background-image: url('<?php echo $image_banner['image']; ?>')">
	</div>		
	<div class="col-md-6 col-sm-12">
		<div class="col-lg-7 col-md-8 col-sm-10 col-lg-offset-3 col-md-offset-2 col-sm-offset-1">
			<div class="text-container">
				<h3><?php echo $image_banner['title']; ?></h3>
				<div class="simple-line"></div>
				<p><?php echo $image_banner['text']; ?></p>
			</div>
		</div>
	</div>
	<div class="button-container">
			<a href="#" class="btn btn-yellow btn-shadow"><strong>get courses guide</strong></a>
		</div>
	<div class="col-md-6 col-sm-12 hidden-xs" style="background-blend-mode: lighten;background-color: #4B5FF7;height: 100%;background-size: cover;background-image: url('<?php echo $image_banner['image']; ?>')">
	</div>		
	</div>
</div>
<?php endif; ?>


<section class="where">
	<div class="container">
			<div class="col-md-10 col-md-offset-1">
				<?php 
				$section_find_us = get_field('section_find_us');	
				if( $section_find_us ):
				?>
				<h1><?php echo $section_find_us['title']; ?><br><span class="blue"><?php echo $section_find_us['title_blue']; ?></span></h1>
				<p class="small"><?php echo $section_find_us['paragraph']; ?></p>
				<?php endif; ?>
			<?php
				$contact_locations_page = 165;

		

			$variable = get_field('locations', $contact_locations_page);
			if( have_rows('locations', $contact_locations_page) ): 

				while( have_rows('locations', $contact_locations_page) ): the_row();
				
				echo '<div class="row row-location">
				<div class="col-md-4">
					<div class="address-box">
						<div class="location">'.get_sub_field('location').'</div>
						<p class="small"><strong>'.get_sub_field('address').'</strong>
						<br>'.get_sub_field('postal_code').'</p>

						<p class="small phone"><img src="'.get_template_directory_uri().'/images/phone.png">'.get_sub_field('phone').'</p>
						<p class="small email"><img src="'.get_template_directory_uri().'/images/mail.png">'.get_sub_field('email').'</p>
					</div>
				</div>
				<div class="col-md-4 location_1" style="height: 211px;background-image: url('.get_sub_field('image_1').')"></div>
				<div class="col-md-4 hidden-sm hidden-xs" style="transform: translateY(66px);"><img src="'.get_sub_field('image_2').'"></div>
			</div>';
			?>
			
			 <?php endwhile; ?>
			<?php endif; ?>
			
			</div>
	</div>
</section>

<section class="who">
	<div class="container">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<?php 
				$section_who = get_field('section_who');	
				if( $section_who ):
				?>
				<h1><?php echo $section_who['title']; ?><br><span class="blue"><?php echo $section_who['title_blue']; ?></span></h1>
				<p class="small"><?php echo $section_who['paragraph']; ?></p>
				<?php endif; ?>
			<?php
				get_template_part( 'template-parts/transformation_space/persons');
				?>
			</div>
		</div>
	</div>
</section>

<?php get_footer();
