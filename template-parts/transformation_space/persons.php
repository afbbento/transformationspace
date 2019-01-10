<?php
/**
 * Template part for Person
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

$theme_url = get_bloginfo('template_url');
?>
<?php

$post = get_post();
if ( $post ) {
    $categories = get_the_category( $post->ID );
   	$category = $categories[0]->slug;
}
if($category=='bootcamp'){
	$team_page = '';
}else{
	$team_page = 187;
}
$variable = get_field('team', $team_page);

$i = 1;
if( have_rows('team', $team_page) ): 
	while( have_rows('team', $team_page) ): the_row();


		if($i % 2 == 0){
			$image_position = "left";
		}else{
			$image_position = "right";
		}
		
		echo '<div class="row person big '.$image_position.'">		
					<div class="col-md-12">
							<div class="frame">
					    		<img src="'.get_sub_field('image').'">
							</div>
							<div class="text-container">
								<p class="lead1">'.get_sub_field('name').'</p>
								<p class="small">'.get_sub_field('position').'</p>			
								<div class="col-md-12">
									<ul class="social-links">';
									if (get_sub_field('fb')){
										echo '<li><a target="_blank" href="'.get_sub_field('fb').'" class=""><i class="fab fa-facebook-f"></i></a></li>';
									}
									if (get_sub_field('linkedin')){
										echo '<li><a target="_blank" href="'.get_sub_field('linkedin').'" class=""><i class="fab fa-linkedin-in"></i></a></li>';
									}
									if (get_sub_field('twitter')){
										echo '<li><a target="_blank" href="'.get_sub_field('twitter').'" class=""><i class="fab fa-twitter"></i></a></li>';
									}	
									echo '</ul>
								</div>						
								<p class="clearfix">'.get_sub_field('bio').'</p>
								<a href="#" class="btn btn-transparent btn-icon"><img src="'.$theme_url.'/assets/images/talk-icon.svg">talk to Victor</a>
							</div>
						</div>
				</div>';

	 	$i++;
	 endwhile; 
endif; 
?>