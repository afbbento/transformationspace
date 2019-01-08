<?php
/**
 * Template part for banner slider
 *
 * Used in About Page
 *
 * 
 *
 * @package WordPress
 * @subpackage Transformation Space
 * @since 1.0
 * @version 1.2
 */

?>
<section class="banner yellow banner-slider">
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div id="banner-slider">
					<?php

							// check if the repeater field has rows of data
							if( have_rows('banner') ):

							 	// loop through the rows of data
							    while ( have_rows('banner') ) : the_row();

							   		echo '<div><p class="x-small upper">'.get_sub_field('label').'</p>';
							        echo '<h2>'.get_sub_field('title').'</h2>';
									echo '<p>'.get_sub_field('text').'</p>';
									echo '<p><a href="#" class="round-button">get courses guide</a></p>';
							    	echo '</div>';
							    endwhile;

							else :

							    // no rows found

							endif;

							?>
				</div>
		  	</div>
	  	</div>
  	</div>
</section>