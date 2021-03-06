<?php
/**
 * Displays top navigation
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.2
 */
$custom_logo_id = get_theme_mod( 'custom_logo' );
$logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );

$template_name = get_page_template_slug( $post->ID );
$categories = get_the_category();

$menu_color = '';

if ( ! empty( $categories ) || $template_name ) {
	$cat_name = $categories[0]->name;
	
	if ($cat_name == 'Bootcamp' || $template_name =='bootcamps.php' || $template_name == 'general-info.php'){
		$menu_color = 'navbar--white-bg';
	}
}

?>

<nav class="navbar navbar-default navbar-fixed-top <?php echo $menu_color; ?>">
    <div class="container">
      	<div class="row">
      	<?php 

      		if ( has_custom_logo() ) {        
        		echo '<a href="/"><div class="custom-logo"></div></a>';
			}
      	?>
	        <div id="navbar">
	        <?php wp_nav_menu( array(
					'theme_location' => 'top',
					'menu_id'        => 'top-menu',
					)); 
			?>
        	</div><!--/.nav-collapse -->
      	</div>
    </div>
</nav>
<div class="right-nav">
	<div class="logo-menu-mobile">
		<img class="visible-xs logo-mobile" src="<?php echo _wp_upload_dir_baseurl(); ?>/logo-mobile.svg">	
	</div>
	<button class="hamburger hamburger--collapse" type="button">
  <span class="hamburger-box">
    <span class="hamburger-inner"></span>
  </span>
</button>

<div class="overlay">
	<div class="container">
		<div class="logo-menu-overlay hidden-xs"><img src="<?php echo esc_url( $logo[0] ); ?>"></div>
		<div class="row">
			<div class="col-md-6">
  				<nav class="overlay-menu">
          			<?php wp_nav_menu( array(
						'menu' => 'Right Nav Menu'
						) ); ?>
       
  				</nav>
  			</div>
  			<div class="col-md-6 hidden-xs">
  				<form class="search" action="/" method="get">				  
				    <input class="borderless-input" type="text" name="s" id="search" placeholder="Search" value="<?php the_search_query(); ?>" />
				    <input type="image" alt="Search" src="<?php bloginfo( 'template_url' ); ?>/assets/images/search.png" />
				</form>
  			
				<div class="newsletter-box bordered-box">
					<h1>Get more info</h1>
					<p>So many things we can share with you. Let your e-mail here</p>
					<form action="https://space.us19.list-manage.com/subscribe/post-json?u=f8fa948d2036f4f4fef049cfc&id=7aa7fb0215&c=?" method="get" id="newsletter-menu" name="mc-embedded-subscribe-form" class="form-inline validate form-newsletter newsletter-menu" target="_blank">	  
					    <input id="mce-EMAIL" name="EMAIL" type="email" required="" placeholder="<?php pll_e('Your e-mail here'); ?>" > 
					    <input class="btn btn-big btn-yellow submit" name="subscribe" type="submit" value="
					    	<?php pll_e('Get started'); ?>">
						<div id="mce-responses" class="clear">
							<p class="response"></p>
						</div>
					</form>
				</div>
					<script>
						jQuery(document).ready( function () {
							var $form = jQuery('.newsletter-menu');

						  if ( $form.length > 0 ) {
						    jQuery('.newsletter-menu input[type=submit]').bind('click', function ( event ){
						      if (event) event.preventDefault()
						        register($form)
						    });
						  }
						});
						</script>
				<div class="dot" style="background-image: url('<?php bloginfo( 'template_url' ); ?>/assets/images/dot.svg');">UX experience Architech <input type="button" class="btn btn-yellow btn-shadow open-btn" value="open"/></div>
				<div class="message" style="background-image: url('<?php bloginfo( 'template_url' ); ?>/assets/images/message.svg');">questions? we are online</div>
  			</div>

  		</div>
	</div>

	<div class="overlay-footer">
		<div class="container">
			<div class="row align-vertical" style="padding: 13px;">
				<div class="col-md-5">
					<?php
			

				if ( has_nav_menu( 'social' ) ) : ?>
					<nav class="social-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Footer Social Links Menu', 'transformationspace' ); ?>">
						<?php
							wp_nav_menu( array(
								'theme_location' => 'social',
								'menu_class'     => 'social-links-menu',
								'depth'          => 1,
								'link_before'    => '<span class="screen-reader-text">',
								'link_after'     => '</span>' . transformationspace_get_svg( array( 'icon' => 'chain' ) ),
							) );
						?>
					</nav><!-- .social-navigation -->
				<?php endif; ?>

					<div class="logo-spaces hidden-xs">
						<img src="<?php bloginfo( 'template_url' ); ?>/assets/images/spaces.svg">
					</div>
				</div>

				<div class="col-md-7 hidden-xs" style="padding-left: 48px;border-left: 2px solid #FFFFFF;">
					<ul class="address-footer-menu">
						<li>
							<h1>Lisbon</h1>
							<p>(+ 351) 210 182 455</p>
							<p>geral@edit.com.pt</p>
						</li>
						<li>
							<h1>Porto</h1>
							<p>(+ 351) 210 182 455</p>
							<p>geral@edit.com.pt</p>
						</li>
						<li>
							<h1>Madrid</h1>
							<p>(+ 351) 210 182 455</p>
							<p>geral@edit.com.pt</p>
						</li>
						<li>
							<h1>São Paulo</h1>
							<p>(+ 351) 210 182 455</p>
							<p>geral@edit.com.pt</p>
						</li>
					</ul>
				</div>
			</div>
		</div>	
	</div>
</div>
</div>
	

