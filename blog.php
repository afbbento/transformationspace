<?php
/*
Template Name: Blog
Template Post Type: page
*/
get_header(); 
?>
<header class="blog-header">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="breadcrumbs">
					<span class="level0"><span class="circle-line"></span>blog </span>
				</div>				
			</div>
		</div>
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<dir class="row title">
					<div class="col-md-7">
						<h1>we have some 
								news for you</h1>

						<nav class="social-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Footer Social Links Menu', 'twentyseventeen' ); ?>">
							<?php
								wp_nav_menu( array(
									'theme_location' => 'social',
									'menu_class'     => 'social-links-menu',
									'depth'          => 1,
									'link_before'    => '<span class="screen-reader-text">',
									'link_after'     => '</span>' . twentyseventeen_get_svg( array( 'icon' => 'chain' ) ),
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

<div class="container main-container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="banner-image latest-post">
				<?php 

					$args = array( 'numberposts' => '1' );
					$recent_posts = wp_get_recent_posts( $args );
					foreach( $recent_posts as $recent ){
					
 					$recent_img_url = get_the_post_thumbnail_url($recent["ID"],'full'); 

				?>
				<div class="row">
					<div class="col-md-6 col-image visible-xs visible-sm" style="background-image: url('<?php echo $recent_img_url; ?>')"></div>	
					<div class="col-md-6 col-sm-12 col-xs-12 text-col">
							<div>
								<p class="x-small category"><?php echo get_the_category_list( ', ', '', $recent["ID"]); ?></p>
								<h3><?php echo $recent["post_title"];  ?></h3>								
								<span class="tag-list"><?php echo get_the_tag_list( '#', ' #', '', $recent["ID"] ); ?></span>
								<div class="simple-line"></div>
								<p><?php echo create_excerpt($recent["post_content"], 120);  ?></p>
							</div>
							<div class="post-meta grey">
								<ul>
									<li>
										<p class="x-small">
											<span class="posted-on">												
												<time class="entry-date published" datetime="2018-11-27T11:42:52+00:00"><?php echo twentyseventeen_posted_on(); ?></time>
											</span>
										</p>
									</li>
									<li class="likes">
										<p class="x-small"><?php 
										if (function_exists('wp_ulike_get_post_likes')):
											echo wp_ulike_get_post_likes($recent["ID"]);
										endif;
									?></p>
									</li>	
									<li class="read-time">
										<p class="x-small"><?php echo estimate_time_read($recent["post_content"]); ?> read</p>
									</li>
								</ul>							
							</div>						
						<div class="button-container">
							<a class="btn btn-yellow shadow" tabindex="0" href="<?php echo get_permalink($recent["ID"])?>">
								<strong>read more</strong>
							</a>
						</div>
					</div>
					<div class="col-md-6 col-image hidden-xs hidden-sm" style="background-image: url('<?php echo $recent_img_url; ?>')"></div>		
				</div>
				<?php } 
					wp_reset_query();
				?>
			</div>

		</div><!-- #col -->
	</div>
	<div class="row blog-headlines">
		<div class="col-md-10 col-md-offset-1">
			<div class="row">
				<div class="col-md-6">
					<?php 
						$args = array( 'numberposts' => '1', 'meta_key' => 'featured', 'meta_value'	=> '1' );
						$featured_post = wp_get_recent_posts( $args );
						
						foreach( $featured_post as $featured ){

						$featured_img_url = get_the_post_thumbnail_url($recent["ID"],'full'); 
						
					?>
					<div class="blog-small-feature">
						<img src="<?php echo $featured_img_url; ?>">
						<div class="text-block">
							<div class="category blue"><?php echo get_the_category_list( ', ', '', $featured["ID"]); ?></div>
							<h3><?php echo $featured["post_title"];  ?></h3>
							<p><?php echo create_excerpt($featured["post_content"], 120);  ?></p>						
						</div>
						<div class="button-container"><a class="btn btn-black read-more shadow" tabindex="0" href="<?php echo esc_url( get_permalink($featured['ID'])); ?>">read more</a></div>
					</div>
					<?php } ?>
				</div>
				<div class="col-md-6">

					<?php 
						$args = array( 'numberposts' => '2', 'offset' => 1 );
						$recent_posts_highlight = wp_get_recent_posts( $args );
						
						foreach( $recent_posts_highlight as $recent_highlight ){
					
							$author_id = get_post_field( 'post_author', $recent_highlight["ID"] );
							$fname = get_the_author_meta( 'first_name', $author_id );
							$lname = get_the_author_meta( 'last_name', $author_id );
							$author_bio = get_the_author_meta( 'description', $author_id );
							
							$author_name =  $fname." ".$lname;
						
					?>
					<div class="blog-item-small">
						<div class="category blue"><?php echo get_the_category_list( ', ', '', $recent_highlight["ID"]); ?></div>
						<h2><?php echo $recent_highlight["post_title"];  ?></h2>
						<span class="tag-list"><?php echo get_the_tag_list( '#', ' #', '', $recent_highlight["ID"] ); ?></span>		
						<div class="author-col">
							<?php echo do_shortcode( '[avatar]' ); ?>
							<p><strong><?php echo $author_name; ?></strong></p>
							<p class="x-small"><?php the_field('user_position', 'user_'. $author_id ); ?></p>					
							<a href="<?php echo get_permalink($recent_highlight["ID"])?>" class="read-more plus-btn" tabindex="0">
								<span class="btn-plus">
									<i class="fas fa-plus"></i>
								</span> 
							</a>
						</div>	
					</div>				
				<?php } wp_reset_query(); ?>
				</div>	
			</div>
		</div>
	</div>
	<div class="row blog-posts-main">
		<div class="col-md-10 col-md-offset-1">
			<h1>where you can <br/> <span class="blue">find more?</span></h1>
			<?php echo do_shortcode('[ajax_load_more orderby="rand" post_type="post" posts_per_page="4" label="Load More" transition="masonry" container_type="ul" masonry_selector=".grid-item" masonry_animation="slide-up"]'); ?>
		</div>
	</div>
</div><!-- .container -->
<?php get_footer(); ?>
