<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage transformationspace
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

	<?php if ( have_posts() ) : ?>		
			<?php
				get_template_part( 'template-parts/transformation_space/archive_header');
		
				$category = get_the_category(); 
				$category_name = $category[0]->slug;
			?>
	<?php endif; ?>

<div class="container main-container">
	<div class="row blog-posts-main">
		<div class="col-md-10 col-md-offset-1">	
			<?php 
			if (is_category()){
			?>		
			<?php echo do_shortcode('[ajax_load_more orderby="rand" category="'.$category_name.'" post_type="post" posts_per_page="4" label="Load More" transition="masonry" container_type="ul" masonry_selector=".grid-item" masonry_animation="slide-up"]'); ?>
			<?php } ?>

			<?php 
			if (is_tag()){

				$tags = $_POST["tags"]; 
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
			
			<?php echo do_shortcode('[ajax_load_more orderby="rand" tag="'.$tags_values.'" post_type="post" posts_per_page="4" label="Load More" transition="masonry" container_type="ul" masonry_selector=".grid-item" masonry_animation="slide-up"]'); ?>
			<?php } ?>
		</div>
	</div>
</div>

<?php get_footer();
