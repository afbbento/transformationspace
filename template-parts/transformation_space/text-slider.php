<?php
/**
 * Template part for Text Slider
 *
 * Used in Front page and Bootcamp
 *
 * 
 *
 * @package WordPress
 * @subpackage Transformation Space
 * @since 1.0
 * @version 1.2
 */
 
$terms = get_field('blog_category_slider');

if ( ! empty( $terms ) ) {
?>


<section class="text-slider">
	<div class="container">

		<?php 
			$see_more = get_field('see_more');	
							

			$title = $see_more['title'];
			$last_space_position = strrpos($title, ' ');
			$title = substr($title, 0, $last_space_position);
			$last_word_start = strrpos($see_more['title'], ' ') + 1;
			$last = substr($see_more['title'], $last_word_start);

			if (get_field('see_more')){
		?>	
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<h1 class="black-text"><?php echo $title; ?><span class="blue"><br> <?php echo $last; ?></span></h1>
				<p class="small black-text"><?php echo $see_more['paragraph']; ?></p>	
			</div>
		</div>
		<?php } ?>
		
		<div class="blog-text-slider">

			<?php 
			$my_query = new WP_query(array('category__and' => $terms)); 
				while ($my_query->have_posts()):
					$my_query->the_post(); 
					$categories = get_the_category();
					if ( ! empty( $categories ) ):
					    $category = esc_html( $categories[0]->name );   
					endif;
			?>

			<div class="col-md-6 borderless-box">
				<div class="lead3"><?php echo $category; ?></div>
				<h3><?php echo the_title(); ?></h3>
				<div class="simple-line"></div>
				<p class="normal"><?php echo get_excerpt(155); ?></p>
				<div class="button-container">
					<a href="<?php the_permalink(); ?>" class="btn btn-black shadow">read more</a>
				</div>				
			</div>

			<?php			
			endwhile;
			wp_reset_query();
			?>
		</div>
		<div class="slider-nav">
			 <button class="prev"><i class="fas fa-chevron-left"></i></button>
			<button class="next"><i class="fas fa-chevron-right"></i></button>
		</div>
	</div>
</section>
<?php } ?>