<?php
/**
 * Template part for About section
 *
 * Used in Front page and About Page
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
$page_id = 5;
$intro_about = get_field('intro_about', $page_id);
if( $intro_about ):
?>

<section class="about-section">
	<div class="container">
		<div class="row">
	 	   		<div class="col-md-6">
	 	   			<div class="about-images-container">
	 	   				<div class="image-front image-border hidden-xs"></div>
	 	   				<div class="image-back hidden-xs">
	 	   					<img src="<?php echo $intro_about['back_image']; ?>">
	 	   					<div class="image-caption">
	 	   						<p><strong><?php echo $intro_about['caption_bold']; ?></strong></p>
	 	   						<p class="x-small"><?php echo $intro_about['caption_paragraph']; ?></p>
	 	   					</div>
	 	   				</div>
	 	   				<div class="image-front">
	 	   					<div>	 	   			
	 	   						<img src="<?php echo $intro_about['front_image']; ?>">
	 	   						<div class="image-caption visible-xs">
	 	   							<p><strong><?php echo $intro_about['caption_bold']; ?></strong></p>
	 	   							<p class="x-small"><?php echo $intro_about['caption_paragraph']; ?></p>
	 	   						</div>
	 	   					</div>	 	   					
	 	   				</div>
	 	   			</div>
	 	   		</div>
	 	   		<div class="col-md-6">
	 	   			<h1><?php echo $intro_about['title']; ?></h1>
	 	   			<p><?php echo $intro_about['text']; ?></p>
	 	   			<?php 
					if (is_front_page()){
						echo '<a href="'.get_permalink(5).'" class="btn btn-yellow btn-shadow">discover more</a>';		
					} 
					if( is_page('general-info') ) {
						echo '<a href="'.get_permalink(5).'" class="btn btn-yellow btn-shadow">more about us</a>';		
					}
	 	   			?>
	 	   		</div>
  		</div>
	</div>
</section>
<?php endif; ?>