<?php
/**
 * Template part for displaying related posts
 *
 * Used in Blog Post
 *
 * 
 *
 * @package WordPress
 * @subpackage Transformation Space
 * @since 1.0
 * @version 1.2
 */

?>
<?php
// Default arguments
$args = array(
	'posts_per_page' => 3, // How many items to display
	'post__not_in'   => array( get_the_ID() ), // Exclude current post
	'no_found_rows'  => true, // We don't ned pagination so this speeds up the query
);

// Check for current post category and add tax_query to the query arguments
$cats = wp_get_post_terms( get_the_ID(), 'category' ); 
$cats_ids = array();  
foreach( $cats as $wpex_related_cat ) {
	$cats_ids[] = $wpex_related_cat->term_id; 
}
if ( ! empty( $cats_ids ) ) {
	$args['category__in'] = $cats_ids;
}

echo '<div class="container related-posts">
		<div class="row">';

// Query posts
$wpex_query = new wp_query( $args );

// Loop through posts
foreach( $wpex_query->posts as $post ) : setup_postdata( $post ); ?>
	
	<div class="col-md-4">
		<div class="related-image"><a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( the_title_attribute( 'echo=0' ) ); ?>"><?php the_post_thumbnail('full'); ?></a></div>
		<div class="post-date"><?php echo twentyseventeen_posted_on(); ?></div>
		<div class="post-title"><p><a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( the_title_attribute( 'echo=0' ) ); ?>"><?php the_title(); ?></a></p></div>
		<div class="simple-line"></div>
		<div class="post-excerpt"><p class="lead3"><?php echo create_excerpt(get_the_content(), 157); ?></p></div>
		<div class="btn-container">
			<a href="<?php the_permalink(); ?>" class="btn read-more btn-transparent">read more</a>
		</div>
	</div>

<?php
// End loop
endforeach;

echo '</div>
	</div>';

// Reset post data
wp_reset_postdata(); ?>