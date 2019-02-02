<?php
/**
 * Displays footer bottom
 *
 * @package WordPress
 * @subpackage transformationspace
 * @since 1.0
 * @version 1.0
 */
$custom_logo_id = get_theme_mod( 'custom_logo' );
$logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
?>
<div class="footer-bottom">
	<div class="row text-center">
		<div class="col-md-12">
			<a href="/"><img width="55" height="55" src="<?php echo _wp_upload_dir_baseurl(); ?>/logo-mobile.svg"></a>
		</div>
	</div>
	<div class="row">
		<?php if ( is_active_sidebar( 'footer-bottom-menu' ) ) : ?>
		<div id="primary-sidebar" class="primary-sidebar widget-area" role="complementary">
			<?php dynamic_sidebar( 'footer-bottom-menu' ); ?>
			<div class="copyright">Copyright © 2019 | EDIT. - Disruptive Digital Education</div>
		</div><!-- #primary-sidebar -->
		<?php endif; ?>
	</div>

</div><!-- .site-info -->
