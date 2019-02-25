<?php
/**
 * Template part for displaying blog articles
 *
 * Used in Homepage and for Bootcamps
 *
 * 
 *
 * @package WordPress
 * @subpackage Transformation Space
 * @since 1.0
 * @version 1.2
 */
// args
$args = array(
	'post_type' => 'blog',
	'post_status' => 'publish',
);
// query
$the_query = new WP_Query( $args );
//var_dump($the_query);
?>
<div class="article-slider vertical-nav-right white-text">
<?php if( $the_query->have_posts() ): ?>
	<?php while( $the_query->have_posts() ) : 
		$the_query->the_post(); ?>
		<div>
			<div class="container">
		 		<div class="row">
					<div class="col-md-6 image-row">
			    		<div class="slider-image">
			    			<div class="lined-box white line-image-frame">
			    				<?php echo the_post_thumbnail('full'); ?>
			   				</div>
			    		</div>
			    	</div>
			   		<div class="col-md-6">
			   			<p class="sup-title">Agile methodologies</p>
						<h3><?php the_title(); ?></h3>
						<p><?php echo get_the_excerpt(); ?></p>
						<a href="<?php the_permalink(); ?>" class="read-more plus-btn">
							<span class="btn-plus"><i class="fas fa-plus"></i></span> read more</a>
		    		</div>
		    	</div>
		 	</div>
		</div>
	<?php 
		endwhile;
		wp_reset_query();  ?>
<?php endif; ?>
</div>