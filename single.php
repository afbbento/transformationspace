<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage transformationspace
 * @since 1.0
 * @version 1.0
 */

get_header();

/* Start the Loop */
$post = get_post();
if ( $post ) {
	$categories = get_the_category( $post->ID );
	$category = $categories[0]->slug;
	$category;
}

if ($category=='bootcamp'){
	get_template_part( 'bootcamp-page', get_post_format() );
}else{
	get_template_part( 'blog-post', get_post_format() );
}

	

	
	




get_footer();
