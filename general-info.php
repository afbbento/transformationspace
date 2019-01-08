<?php
/*
Template Name: General Info
Template Post Type: page
*/

get_header(); ?>

<header class="blog-header">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="breadcrumbs">
					<span class="level0"><span class="circle-line"></span>general info </span>
				</div>				
			</div>
		</div>	
	</div>
</header>

<?php
	get_template_part( 'template-parts/transformation_space/section-about');
?>

<section class="magic">
	<div class="container">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<h1>our team</h1>
				<p class="small">Looking back over the last 40 years, it’s hard to understand how we could have been so gullible. We believed that fat, and more specifically saturated fat...</p>
				<?php
					get_template_part( 'template-parts/transformation_space/persons');
				?>
			</div>
		</div>
	</div>
</section>


<section class="job-offers">
	<div class="container">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<h1>job offers</h1>
				<p class="small">Looking back over the last 40 years, it’s hard to understand how we could have been so gullible. We believed that fat, and more specifically saturated fat...</p>

				<div class="row filter-job">
					<div class="col-md-4 col-sm-6">
						<form id="category-select" class="category-select" action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get">
							<select id="job-position">
								<option value="0" selected >All positions</option>
								<?php 
									if( have_rows('jobs', 617) ):

 										while ( have_rows('jobs', 617) ) : the_row();

						 					echo '<option value="'.the_sub_field('position').'">'.get_sub_field('position').'</option>';

							
											endwhile;
											
										endif; 
										?>								
							</select>
						</form>
					</div>
					<div class="col-md-4 col-sm-6">
						<form id="category-select" class="category-select" action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get">
							<select id="job-location">
								<option value="0" selected >Location/Places</option>
								<?php 
									if( have_rows('jobs', 617) ):

 										while ( have_rows('jobs', 617) ) : the_row();

						 					echo '<option value="'.the_sub_field('location').'">'.get_sub_field('location').'</option>';

								
										endwhile;
										
										endif; 
									?>	
							</select>
						</form>
					</div>
				</div>
				<?php 

					if( have_rows('jobs', 617) ):

 					while ( have_rows('jobs', 617) ) : the_row();
    				
    				$location_color = get_sub_field('location_color');
    				$pieces = explode(":", $location_color);
    				$color = $pieces[0];
    			?>
				<div class="job-item">					
					<div class="row">						
						<div class="location <?php echo $color; ?>"><?php the_sub_field('location'); ?></div>
						<div class="col-md-2">							
							<div class="job-image">						
								<img src="http://localhost:8888/wp-content/uploads/job-logo.jpg">						
							</div>
						</div>
						<div class="col-md-3">
							<div class="job-position">							
								<p><strong><?php the_sub_field('position'); ?></strong></p><p><?php the_sub_field('time'); ?></p>							
							</div>
						</div>
						<div class="col-md-5">
							<div class="job-available">
								<p><strong><?php the_sub_field('availability'); ?></strong></p>
							</div>
						</div>
						<div class="col-md-2 hidden-xs">							
							<p class="more-info">get more info</p>									
						</div>
					</div>			
					<a href="#" class="round-btn blue"><i class="fas fa-chevron-right"></i></a>	
				</div>
					<?php endwhile; ?>
					<?php endif; ?>					
			</div>
		</div>
	</div>
</section>
<section class="faqs">
	<div class="container">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<h1>here are<span class="blue"><br> the faq's</span></h1>
				<div class="row">
					<div class="col-md-4">
						<p><strong>1. what is a bootcamp?</strong></p>
						<p class="small">Letícia is a Ux Lead at Oglivy Barcelona. She work focusing on Research, create products and services that matter. <i class="fas fa-plus blue"></i></p>
					</div>
					<div class="col-md-4">
						<p><strong>2. where does the bootcamp takes place?</strong></p>
						<p class="small">Letícia is a Ux Lead at Oglivy Barcelona. She work focusing on Research, create products and services that matter. <i class="fas fa-plus blue"></i></p>
					</div>
					<div class="col-md-4">
						<p><strong>3. what is a bootcamp?</strong></p>
						<p class="small">Letícia is a Ux Lead at Oglivy Barcelona. She work focusing on Research, create products and services that matter. <i class="fas fa-plus blue"></i></p>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="page-content">
	<div class="container">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<article>
				<?php 
				while ( have_posts() ) : the_post();
					the_content(); 
				endwhile;
				?>
				</article>
			</div>
		</div>
	</div>
</section>

<?php get_footer();