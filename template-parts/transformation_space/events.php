<?php
/**
 * Template part for Homepage Events
 *
 * Used in Bootcamp and Homepage
 *
 * 
 *
 * @package WordPress
 * @subpackage Transformation Space
 * @since 1.0
 * @version 1.2
 */
?>
<section class="events">
	<div class="container">
		<div class="bordered-box">
			<div class="button-container">
				<button class="btn btn-black btn-large btn-shadow btn-lines">events</button>
			</div>
			<div class="row">
				<div class="col-md-8 col-md-offset-2">
					<p>transformation.space is a Global EDTECH & Career Acceleration Company with campuses in São Paulo, Barcelona, Madrid, Lisbon & Oporto. </p>
					<div class="event-search">
						<?php 

						if( have_rows('events', 404) ):
							$i=0;
							$taglist .= '[';
							while ( have_rows('events', 404 ) ) : the_row();   
							
								while( have_rows('tags_repeater') ): the_row();

									$taglist .= '"'.get_sub_field('tags').'"';
									
									$taglist .= ',';
								 endwhile; 
				
      						endwhile;
      						$taglist = rtrim($taglist, ',');
							
							$taglist .= ']';
						endif;
							
						?>	
						
						<script>							
							jQuery( document ).ready(function() {
							
							var list =  <?php echo $taglist; ?>;
							jQuery('[name=tags]').tagify({
								duplicates: false,
								enforceWhitelist: true,
								autoComplete: true,
								whitelist: list

							}).on('add', function(e, tagName){
							    
							   var all_tags = jQuery('[name=tags]').data('tagify').value;
							    //console.log(all_tags);



							    jQuery(".event-item").each(function(){

							 		var tag = jQuery(this).data("tags");
							 		

							 		jQuery.each( all_tags, function( index, value ) {
									    var the_tag = all_tags[index].value;
										

								 		if (tag.indexOf('porto') <= 0){
								 			jQuery(this).show();	
								 			console.log(tag+"-"+the_tag);							 								
								 		}else{
								 			jQuery(this).hide();
								 		}		
							 		});		
								
								});
							}).on('remove', function(e, tagName){
							    
							    var all_tags = jQuery('[name=tags]').data('tagify').value;
							    console.log(all_tags);


							    jQuery(".event-item").each(function(){
							 	
							 		var tag = jQuery(this).data("tags");
							 		//console.log(tag);
							 		/*if (tag.indexOf(tagName) <= 0){
							 			jQuery(this).hide();
							 		}*/				
								});
							});
						
						});		
						</script>

						<form id="tags"  method="post">						 
							<input name="tags" placeholder="" value="<?php echo $tags_values; ?>">						
						</form>
					</div>	
					<div class="events-result">
						
						<?php 

						if( have_rows('events', 404) ):
					
							while ( have_rows('events', 404 ) ) : the_row();   
							$select = get_sub_field_object('tags');
      						$item_id = $select['name'];
							switch (strtolower(get_sub_field('city'))) {
							    case 'lisboa':
							        $bg = 'black';
							        break;
							    case 'porto':
							        $bg = 'yellow';
							        break;
							    case 'madrid':
							        $bg = 'blue';
							        break;
							}
						
							while( have_rows('tags_repeater') ): the_row();

									$tags .= get_sub_field('tags');
									
									$tags .= ',';
								 endwhile; 
						?>

						<div id="<?php echo $item_id; ?>" data-tags="<?php echo $tags; ?>" class="event-item bordered-box">
							<div class="event-location <?php echo $bg; ?>"><?php echo get_sub_field('city'); ?></div>
							<div class="row align-vertical">
								<div class="col-md-3">
									<div class="event-day"><?php echo get_sub_field('day'); ?></div>
									<div class="event-month"><?php echo get_sub_field('month'); ?></div>
								</div>
								<div class="col-md-7">
									<div class="event-item-text">
										<div class="lead3"><?php echo get_sub_field('title'); ?></div>
										<p class="small"><?php echo get_sub_field('text'); ?></p>
									</div>
								</div>
								<div class="col-md-2 align-center link-event">
									<a href="#">
										<span class="btn-plus">
											<i class="fas fa-plus"></i>
										</span>
									</a>
								</div>
							</div>
						</div>
						<?php
							endwhile;
						endif;
						?>
						
					</div>
				</div>
			</div>
		</div>
	</div>
</section>