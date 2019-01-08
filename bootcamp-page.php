<?php
/*
Template Name: Bootcamps
Template Post Type: post, page, event
*/

?>
<header class="bootcamp" style="background-image: url('/wp-content/uploads/bg-bootcamp.jpg');">
	<div class="container">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="breadcrumbs white">
					<span class="level0"><span class="circle-line white"></span>bootcamps </span><i class="fas fa-chevron-right"></i><span class="level1"><?php echo get_the_title(); ?> </span>
				</div>
				<?php
					get_template_part( 'template-parts/transformation_space/bootcamp-box');
				?>
			</div>
		</div>
	</div>
</header>

<?php 
$bootcamp_description = get_field('bootcamp_description');	
if( $bootcamp_description ):
?>
<section class="bootcamp-description">
	<div class="container">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="row">
					<div class="col-md-6">
						<div class="bootcamp-desc-image">
							<img src="<?php echo $bootcamp_description['image']; ?>'">
						</div>
					</div>
					<div class="col-md-6">
						<p><b><?php echo $bootcamp_description['title']; ?></b></p>
						<p><?php echo $bootcamp_description['text']; ?></p>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<?php endif; ?>

<section class="programme">
	<div class="container">
		<div class="col-md-10 col-md-offset-1">
			<h1>Programme +<br><span class="blue">pre-course</span></h1>
			<p class="small">Looking back over the last 40 years, it’s hard to understand how we could have been so gullible. We believed that fat, and more specifically saturated fat...</p>
			
		<div class="banner-image" style="padding: 0;">
			<div class="row flex v-center">
				<div class="col-md-6">
					<div class="col-md-10 col-md-offset-1">
						<div class="">
							<h3>We have the right path to your future job</h3>
							<div class="simple-line"></div>
							<p>Looking back over the last 40 years, it’s hard to understand how we could have been so gullible. We believed that fat, and more specifically saturated fat...</p>
						</div>
					</div>
				</div>
				<div class="col-md-6 col-image" style="background-blend-mode: lighten;background-color: #4B5FF7;height: 100%;background-position: -135px;background-size: cover;background-image: url('/wp-content/uploads/student-half.jpg')">
				</div>		
			</div>
		</div>
		<?php
			get_template_part( 'template-parts/transformation_space/timeline');
		?>
	</div>
</section>

<section class="career">
	<div class="container">
 		<div class="col-md-10 col-md-offset-1">
 		<?php 
			$career_section_title = get_field('career_section_title');	
			if( $career_section_title ):
			

			$title_ = explode(" ", $career_section_title['title'], 2);
        	$title  = $title_[0].' <br><span class="blue">'.$title_[1].'</span>';
        	
		?>
			<h1><?php echo $title; ?></h1>
			<p class="small"><?php echo $career_section_title['paragraph']; ?></p>

		<?php endif; ?>
			
				<div class="row equal-pad">
					<?php 
					if( have_rows('career_section') ):
						$rows_count = count(get_field('career_section'));
						
						$i = 1;
						while ( have_rows('career_section') ) : the_row();

							echo '<div class="col-md-4 col-xs-12">
								  	<p class="text-center"><img src="'.get_sub_field('image').'"></p>
								  	<p class="lead2 text-center">'.get_sub_field('title').'</p>
								  	<p class="small">'.get_sub_field('text').'</p>
								  </div>';

						endwhile;
				
					endif;
					?>	
				</div>
			</div>
	</div>
</section>


<section class="blog typical-day">
	<div class="container">
		<?php 
			$typical_day_title = get_field('typical_day_title');	
			if( $typical_day_title ):
			

			$title_ = explode(" ", $typical_day_title['title'], 2);
        	$title  = $title_[0].' <span class="blue">'.$title_[1].'</span>';
        	
		?>
			<h1 class="white-text"><?php echo $title; ?></h1>
			<p class="small white-text"><?php echo $typical_day_title['paragraph']; ?></p>

		<?php endif; ?>
		<div class="row bs-wizard" style="border-bottom:0;">
                
                <div class="col-xs-3 bs-wizard-step disabled">
                  <div class="progress"><div class="progress-bar"></div></div>
                  <a href="#" class="bs-wizard-dot">1</a>
                </div>
                
                <div class="col-xs-3 bs-wizard-step"><!-- complete -->
                  <div class="progress"><div class="progress-bar"></div></div>
                  <a href="#" class="bs-wizard-dot">2</a>
                </div>
                
                <div class="col-xs-3 bs-wizard-step"><!-- complete -->
                  <div class="progress"><div class="progress-bar"></div></div>
                  <a href="#" class="bs-wizard-dot">3</a>
                </div>
                
                <div class="col-xs-3 bs-wizard-step"><!-- active -->
                  <div class="progress"><div class="progress-bar"></div></div>
                  <a href="#" class="bs-wizard-dot">4</a>
                </div>
            </div>
		<div class="article-slider vertical-nav-right white-text">
			<?php 
					if( have_rows('typical_day') ):
						
						while ( have_rows('typical_day') ) : the_row();

							echo '<div>
							    	<div class="container">
							    		<div class="row">
							    			<div class="col-md-6">
							    				<div class="slider-image">
							    					<div class="lined-box white line-image-frame">
							    						<img src="'.get_sub_field('image').'">
							    					</div>
							    				</div>
							    			</div>
							    			<div class="col-md-6">
							    				<p class="sup-title">'.get_sub_field('category').'</p>
							    				<h3>'.get_sub_field('title').'</h3>
												<p>'.get_sub_field('text').'</p>					
							    			</div>
							    		</div>
									</div>
								</div>';

						endwhile;
				
					endif;
					?>	
		 
		</div>
	</div>
</section>
<script type="text/javascript">
	jQuery('.article-slider').on('afterChange', function(event, slick, currentSlide, nextSlide){
  		
  		var current = currentSlide + 1;
		jQuery('.row.bs-wizard div').removeClass('disabled');
		jQuery('.row.bs-wizard div:nth-child('+current+')').addClass('disabled');
  		
	});
</script>
<div class="separator">
	<div class="line"></div>
	<div class="button-container">
		<button class="btn btn-black btn-large btn-shadow">education team & partners</button>
	</div>
	<div class="container">
		<div class="row">
	 	   	<div class="col-md-7 col-md-offset-3">
				<p>transformation.space is a Global EDTECH & Career Acceleration Company with campuses in São Paulo, Barcelona, Madrid, Lisbon & Oporto. </p>
			</div>
		</div>
	</div>
</div>
<section>
	<div class="container">
		<div class="col-md-10 col-md-offset-1">
			<div class="row">
				<h1>your<span class="blue"><br> facilitator</span></h1>
				<p class="small">Looking back over the last 40 years, it’s hard to understand how we could have been so gullible. We believed that fat, and more specifically saturated fat...</p>
			</div>
			<?php
				get_template_part( 'template-parts/transformation_space/persons');
			?>
			<div class="row other-guests">
				<h2><span class="circle-line"></span>other guests</h2>

				<?php 
					if( have_rows('other_guests') ):
						$rows_count = count(get_field('other_guests'));
						
						$i = 1;
						while ( have_rows('other_guests') ) : the_row();
							
							if($i % 2 == 0){
							     $position = 'col-md-offset-5';
							} else {
							     $position = '';
							}
							echo '<div class="row">
									<div class="col-md-6 person '.$position.' small">
										<div class="row">
											<div class="col-md-6">
												<div class="frame">
										    		<img src="'.get_sub_field('image').'">
												</div>
											</div>
											<div class="col-md-6">
												<p class="lead1">'.get_sub_field('name').'</p>
													<ul class="social-links">';
													if (get_sub_field('fb')){
														echo '<li><a target="_blank" href="'.get_sub_field('fb').'" class=""><i class="fab fa-facebook-f"></i></a></li>';
													}
													if (get_sub_field('linkedin')){
														echo '<li><a target="_blank" href="'.get_sub_field('linkedin').'" class=""><i class="fab fa-linkedin-in"></i></a></li>';
													}
													if (get_sub_field('twitter')){
														echo '<li><a target="_blank" href="'.get_sub_field('twitter').'" class=""><i class="fab fa-twitter"></i></a></li>';
													}	
													echo '</ul>
												<p class="small">'.get_sub_field('bio').'</p>
											</div>
										</div>
									</div>
								</div>';
						$i++;
						endwhile;
						
					endif;
					?>					
			</div>
		</div>
	</div>
</section>

<!---DISABLED for now-->
<?php if( !have_rows('education_items', 2) ): ?>

<section class="education" style="background-image: url('wp-content/themes/transformationspace/images/homepage-education-section.jpg');">
	<div class="container">
		<div class="row">
			<?php	
					while ( have_rows('education_items',2 ) ) : the_row();    
					    
					echo '<div class="col-md-6">
				 	   		<div class="education-item">
					 	   		<img src="'.get_sub_field('image').'">
					 	   		<div class="inner-content">
						 	   			<h1>'.get_sub_field('title').'</h1>
						 	   			<p>'.get_sub_field('text').'</p>
						 	   		</div>
						 	   			<ul class="social-links center">';
						 	   			
										if (!get_sub_field('fb')){
											echo '<li><a target="_blank" href="'.get_sub_field('fb').'" class=""><i class="fab fa-facebook-f"></i></a></li>';
										}
										if (!get_sub_field('linkedin')){
											echo '<li><a target="_blank" href="'.get_sub_field('linkedin').'" class=""><i class="fab fa-linkedin-in"></i></a></li>';
										}
										if (!get_sub_field('twitter')){
											echo '<li><a target="_blank" href="'.get_sub_field('twitter').'" class=""><i class="fab fa-twitter"></i></a></li>';
										}
											
					echo '</ul>
						 	   		<a href="#" class="btn btn-transparent full-width">know more</a>
						 	   	
					 	   	</div>
				 	   	</div>';					    
					endwhile;			
					?>
	 
	 	</div>
	</div>
</section>
<?php endif; ?>

<section class="banner yellow banner-enroll">
	<div class="row">
		<div class="col-md-5 col-md-offset-4">
			<h1>Change your career</h1>
			<p>At half-past eight the door opened, the policeman appeared, and, requesting them to follow him, led the way to an adjoining hall. It was evidently a court-room.</p>
			<a href="#" class="btn btn-black">enroll now</a><a href="#" class="btn btn-transparent">download</a>
		</div>
	</div>
</section>
<?php
	get_template_part( 'template-parts/transformation_space/stories');
?>

<div class="separator">
	<div class="line"></div>
	<div class="button-container">
		<button class="btn btn-black btn-large btn-shadow">dates & investiment</button>
	</div>
	<div class="container">
		<div class="row">
	 	   	<div class="col-md-7 col-md-offset-3">
				<p>transformation.space is a Global EDTECH & Career Acceleration Company with campuses in São Paulo, Barcelona, Madrid, Lisbon & Oporto. </p>
			</div>
		</div>
	</div>
</div>

<section class="bootcamp-investment">
	<div class="container">
		<div class="col-md-9 col-md-offset-2">
			<div class="row">
				<div class="bordered-box">
					<div class="row">
						<div class="col-md-3">
							<h4><strong>Investiment:</strong></h4>	
						</div>
						<?php 

							$investment = get_field('investment');	
							if( $investment ){
								echo '<div class="col-md-9">
									<p><strong>'.$investment['text_bold'].'</strong></p>
									<p class="x-small">'.$investment['paragraph'].'</p>
								</div>';
					      	
							}
					        	
						?>
						
					</div>
					<div class="row">
						<div class="col-md-3">
							<h4><strong>Dates:</strong></h4>	
						</div>
						<div class="col-md-9">
							<p><strong><?php the_field('start_date'); ?> || <?php the_field('end_date'); ?></strong></p>
							<p><strong><?php the_field('schedule'); ?></strong></p>

							<p class="x-small"><strong><?php echo $investment['dates_info']; ?></strong></p>
							<p class="x-small">Classes every <?php the_field('days_of_the_week'); ?></p>
							
						</div>
					</div>
					<div class="row">
						<div class="button-wrapper">
							<div class="button black-border retro-btn-left">Register today</div>
						</div>	
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="financial">
	<div class="container">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="bordered-box main-box" style="padding: 40px;">
					<div class="button-container">
						<button class="btn btn-yellow btn-large btn-shadow btn-lines-yellow vertical-btn">financial agreements</button>
					</div>
					<div class="row">
						<div class="col-md-10 col-md-offset-1">
							<p>transformation.space is a Global EDTECH & Career Acceleration Company with campuses in São Paulo, Barcelona, Madrid, Lisbon & Oporto. </p>	
							<div class="boxes-container">
								<?php 
									if( have_rows('financial') ):
										$rows_count = count(get_field('financial'));
										
										$i = 1;
										while ( have_rows('financial') ) : the_row();

											if ($i<10){
												$number = str_pad($i, 2, '0', STR_PAD_LEFT);
											}else{
												$number = $i;
											}
											
								?>
								
								<div class="event-item bordered-box">
									<div class="event-location <?php echo $bg; ?>"><?php echo get_sub_field('city'); ?></div>
									<div class="row align-vertical">
										<div class="col-md-3">
											<div class="event-day"><?php echo $number; ?></div>
											<div class="event-month">option</div>
										</div>
										<div class="col-md-7">
											<div class="event-item-text">
												<div class="lead3"><?php echo get_sub_field('title'); ?></div>
												<p class="small"><?php echo get_sub_field('text'); ?></p>
											</div>
										</div>
										<div class="col-md-2 text-center">
											<a class="btn-plus" href="#"><i class="fas fa-plus"></i></a>
										</div>
									</div>
								</div>
										
								<?php
									$i ++;
									endwhile;
								endif;
								?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
	</div>
</section>


<?php
	get_template_part( 'template-parts/transformation_space/text-slider');
?>

<?php
	$banner_color = 'blue';
	include(locate_template('template-parts/transformation_space/more-info-banner.php'));
?>
<?php
	get_template_part( 'template-parts/transformation_space/faqs');
?>
<section>
	<div class="container">
		<div class="row align-vertical">
			<div class="col-md-6 text-center">
				<img src="/wp-content/uploads/certificacao.png">
			</div>
			<div class="col-md-4">
				<h3>We are certified by Dgert Entidade</h3>
				<p>Looking back over the last 40 years, it’s hard to understand how we could have been so gullible. We believed that fat, and more specifically saturated fat...</p>
			</div>
		</div>
	</div>
</section>
