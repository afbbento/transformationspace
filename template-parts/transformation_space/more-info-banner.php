<?php
/**
 * Template part for banner Get more info
 *
 * Used in Front page and Bootcamp page.
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
	if ($banner_color=='yellow'){
		$btn_color='blue';
	}else{
		$btn_color='yellow';
	}
?>
<section class="banner <?php echo $banner_color; ?> info-banner pt-50 pb-50">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
			<h3><?php pll_e('Get more info'); ?></h3>
			<p><?php pll_e('So many things we can share with you. Let your e-mail here'); ?></p>
				<div id="mc_embed_signup">
					<form action="https://space.us19.list-manage.com/subscribe/post-json?u=f8fa948d2036f4f4fef049cfc&id=7aa7fb0215&c=?" method="get"  name="mc-embedded-subscribe-form" id="banner-newsletter" class="banner-form form-inline validate" target="_blank">
					    <div class="form-group">
					      <label for="name"><?php pll_e('Name'); ?></label>
					      <input type="text" class="big" id="mce-FNAME" placeholder="<?php pll_e('Your name here'); ?>" name="FNAME" required="">
				
					    </div>
					    <div class="form-group input-password">
					      <label for="email">Email:</label>
					      <input id="mce-EMAIL" name="EMAIL" type="email" class="big" required="" placeholder="<?php pll_e('Your e-mail here'); ?>" > 
					    </div>
					    <div class="form-group">
						    <label for="submit">&nbsp;</label>
					    	
					    	<input class="btn btn-big btn-<?php echo $btn_color; ?> btn-shadow submit" name="subscribe" type="submit" value="
					    	<?php pll_e('Get amazingness'); ?>">
						</div>
						<div id="mce-responses" class="clear">
							<p class="response"></p>
							</div>
					  </form>
				</div>
		  	</div>
	  	</div>
  	</div>
</section>
<script>
jQuery(document).ready( function () {
	var $form = jQuery('.banner-form');

  if ( $form.length > 0 ) {
    jQuery('.banner-form input[type=submit]').bind('click', function ( event ){
      if (event) event.preventDefault()
        register($form)
    });
  }
});


</script>