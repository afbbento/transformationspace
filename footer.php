<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.2
 */

?>

		</div><!-- #content -->

		<footer id="colophon" class="site-footer" role="contentinfo">
			<div class="container">
				<div class="row text-center">
					<div class="col-lg-10 col-lg-offset-1 col-md-12">
						<div class="row">
							<div class="col-md-3">
								<?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
								<div id="primary-sidebar" class="primary-sidebar widget-area" role="complementary">
									<?php dynamic_sidebar( 'footer-1' ); ?>
								</div><!-- #primary-sidebar -->
								<?php endif; ?>
							</div>
							<div class="col-md-3">
								<?php if ( is_active_sidebar( 'footer-2' ) ) : ?>
								<div id="primary-sidebar" class="primary-sidebar widget-area" role="complementary">
									<?php dynamic_sidebar( 'footer-2' ); ?>
								</div><!-- #primary-sidebar -->
								<?php endif; ?>
							</div>
							<div class="col-md-6">
								<div class="newsletter-box bordered-box">
									<p class="x-small"><strong>SIGN OUR NEWSLETTER</strong></p>
									<label>Enter your email</label>
									<form action="https://space.us19.list-manage.com/subscribe/post-json?u=f8fa948d2036f4f4fef049cfc&id=7aa7fb0215&c=?" method="get" id="newsletter-footer" name="mc-embedded-subscribe-form" class="form-inline validate form-newsletter newsletter-footer" target="_blank">			  
									    <input id="mce-EMAIL" name="EMAIL" type="email" required="" placeholder="<?php pll_e('Your e-mail here'); ?>" > 
									    <input class="btn btn-big btn-yellow submit" name="subscribe" type="submit" value="
					    	<?php pll_e('Get started'); ?>">
							    	<div id="mce-responses" class="clear">
										<p class="response"></p>
									</div>
									</form>
								</div>
							</div>
						</div>
						<script>
						jQuery(document).ready( function () {
							var $form = jQuery('.newsletter-footer');

						  if ( $form.length > 0 ) {
						    jQuery('.newsletter-footer input[type=submit]').bind('click', function ( event ){
						      if (event) event.preventDefault()
						        register($form)
						    });
						  }
						});
						</script>
						<div class="row address">
								<?php 
									$contact_locations_page = 165;
									$variable = get_field('locations', $contact_locations_page);
									if( have_rows('locations', $contact_locations_page) ): 
										while( have_rows('locations', $contact_locations_page) ): the_row();

								?>
							<div class="col-md-3 col-sm-6">
								<div class="lead1 upper text-left"><?php echo get_sub_field('location'); ?></div>
								<div class="address-box">	
									<p class="small address"><img src="<?php echo _wp_upload_dir_baseurl(); ?>/location-icon.svg"><strong><a href="https://www.google.com/maps/place/EDIT.+-+Disruptive+Digital+Education/@38.7359268,-9.1315457,17.38z/data=!4m5!3m4!1s0x0:0xac0c1f4d67894d63!8m2!3d38.7367839!4d-9.1298077" target="_blank"><?php echo get_sub_field('address'); ?></a></strong>
									</p><p><?php echo get_sub_field('postal_code'); ?></p>

									<p class="small phone"><img src="<?php bloginfo('template_url'); ?>/assets/images/phone.png"><?php echo get_sub_field('phone'); ?></p>
									<p class="small email"><img src="<?php bloginfo('template_url'); ?>/assets/images/mail.png"><?php echo get_sub_field('email'); ?></p>
								</div>
							</div>
							<?php endwhile; ?>
							<?php endif; ?>
							
						</div>					
					</div>				
				</div>
			
				<?php
					//temporarly disabled, to enable remove ==0
					if ( has_nav_menu( 'social' ) == '0') : 
					?>
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
				<?php endif; ?>

				<?php get_template_part( 'template-parts/footer/footer', 'bottom' ); ?>				
			</div><!-- .wrap -->
		</footer><!-- #colophon -->
	</div><!-- .site-content-contain -->
</div><!-- #page -->
<?php wp_footer(); ?>



</body>
</html>
