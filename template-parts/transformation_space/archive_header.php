<?php
/**
 * Template part for displaying archive header
 *
 * Used in blog category and for blog tags
 *
 * 
 *
 * @package WordPress
 * @subpackage Transformation Space
 * @since 1.0
 * @version 1.2
 */

?>
<header class="blog-header">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="breadcrumbs">
					<?php 
						if (is_category()){
							$page_type = 'category';
						}
						if (is_tag()){
							$page_type = 'tag';
						} 
						
						$category = get_the_category(); 
						$category_name = $category[0]->slug;

					?>	

					<div class="breadcrumbs black">
						<span class="level0"><span class="circle-line"></span><?php echo $page_type; ?> </span><i class="fas fa-chevron-right"></i><span class="level1"><?php echo $category_name; ?> </span>
					</div>
					
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
				<div class="row row-select-categories">
					<div class="col-md-12">
						<?php 
							if (is_category()){
						?>
						<p class="lead1"> <?php _e( 'categories:' ); ?></p>						
						<form id="category-select" class="category-select" action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get">
							<?php wp_dropdown_categories( 'show_count=1' ); ?>							
						</form>
						<script>
							jQuery( "#cat" ).change(function() {
	  							jQuery( "#category-select" ).submit();
							});
						</script>
						<?php } ?>
						<?php 
							if (is_tag()){
						?>		
						<p class="lead1"> <?php _e( 'tags:' ); ?></p>

						<?php 


							$all_tags = get_tags(array(
							  'hide_empty' => false
							));

							$taglist .= '[';
							$i=0;
							foreach ($all_tags as $tag) {
							  if ($i==0){
							  	$taglist .= '';
							  }
							  else{
							  	$taglist .= ',';
							  }
							  $taglist .= '"'.$tag->name.'"';

							  $i=1;
							}
							
							$taglist .= ']';		
			
						?>	
						<script>
							jQuery( document ).ready(function() {
							
							var list =  <?php echo $taglist; ?>;
							jQuery('[name=tags]').tagify({
								duplicates: false,
								enforceWhitelist: true,
								autoComplete: true,
								whitelist: list ,

							});
							var myInput = jQuery('[name=tags]').tagify();

							myInput.on('add', function(e, tagName){
							 
							  jQuery( "#tags" ).submit();
							});
							myInput.on('remove', function(e, tagName){
							 
							  jQuery( "#tags" ).submit();
							});
						});		
						</script>
						<?php $tags = $_POST["tags"]; 
							$tags = stripcslashes($tags);							
							$json = json_decode($tags, true);
							
												
							$v=0;
							foreach ($json as $item) {
								
								$tags_values .= ",".$json[$v]['value'];
								$v++;
							}

							$obj = get_queried_object();

							
							if ($obj){
								$tags_values .= ",".$obj->slug;
							}
							
						?> 
						<form id="tags"  method="post">						 
						  <input name="tags" placeholder="write some tags" value="<?php echo $tags_values; ?>">
						
						</form>
						
						<?php } ?>
					</div>					
				</div>			
			</div>
		</div>
	</div>
</header>