
<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package WordPress
 * @subpackage transformationspace
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>


<div class="main-content">
	<div class="content-inner">
			<div class="gif-container">

				
  				<img src="<?php echo _wp_upload_dir_baseurl(); ?>/john.gif" width="350" height="300" />
			</div>
			<p class="title">404 - not found</p>
			<p class="lead">lost your way?</p>
			<p>don´t worry, we are here to help you</p>
			<p><a href="/" class="btn btn-yellow">back to transformation</a>
		
	</div>
<?php dynamic_sidebar( 'footer-bottom-menu' ); ?>

</div>