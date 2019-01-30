<?php
/*
Template Name: Bootcamps
Template Post Type: post, page, event
*/

get_header(); ?>
<header style="background-image: url('<?php bloginfo('template_url'); ?>/assets/images/bg-events.jpg');">
	<div class="container">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="breadcrumbs white">
					<span class="level0"><span class="circle-line"></span>bootcamps </span>
				</div>
				<div class="row">
					<div class="col-md-8 col-md-offset-2">
						<div class="row">
							<div class="col-md-12">
								<p class="white-text text-center">You can find the perfect bootcamp for you here and start the transformation that 	will make you career thrive.</p>
							</div>
						</div>
						<div class="row row-filter">
							<div class="col-md-6">
								<form id="category-select" class="category-select" action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get">
									<select id="bootcamp-filter">
										<option value="0" selected >Bootcamp</option>
									<?php 
										$args = array(
										    'category_name' => 'Bootcamp'
										);
										$the_query = new WP_Query( $args );
										
										if( $the_query->have_posts() ): 
						 					while( $the_query->have_posts() ) : $the_query->the_post(); 

						 					echo '<option value="'.get_the_ID().'">'.get_the_title().'</option>';

									?>	


										<?php 
											endwhile;
											wp_reset_query(); 
											endif; 
										?>
									</select>
								</form>
							</div>
							<div class="col-md-6">
								<form id="location-select" class="category-select" action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get">									
									<select id="bootcamp-location-filter">
									<option value="0" selected>Location/School</option>
									<?php 
						         		$args = array(
										    'category_name' => 'Bootcamp',										    
										);
										// query
										$the_query = new WP_Query( $args );
									 if( $the_query->have_posts() ): 
										 while( $the_query->have_posts() ) : $the_query->the_post(); 
										
						         	
						         	
						         	echo '<option value="'.get_field('bootcamp_location').'">'.get_field('bootcamp_location').'</option>';
						         	


						         	endwhile;
									wp_reset_query(); 
									endif; ?>

																
									</select>
								</form>
							</div>
						</div>					
					</div>
				</div>			
				<?php
					get_template_part( 'template-parts/transformation_space/bootcamp-box');
				?>
			</div>
		</div>
	</div>
</header>

<?php get_footer();