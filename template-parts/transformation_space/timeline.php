<?php
/**
 * Template part for Timeline
 *
 * Used in Bootcamp
 *
 * 
 *
 * @package WordPress
 * @subpackage Transformation Space
 * @since 1.0
 * @version 1.2
 */
?>
<div id="timeline-wrapper">
	<div class="container-fluid">
		<div class="row">
    		<div class="timeline-block">
		        <div class="timeline-events">
		        	<?php
		        	if( have_rows('bootcamp_timeline') ):
						$rows_count = count(get_field('bootcamp_timeline'));
						
						$i = 1;
						while ( have_rows('bootcamp_timeline') ) : the_row();
				
						
						if($i % 2 == 0){
							echo '<div class="row">
						            <div class="event r-event col-md-6 col-sm-6 col-xs-11">
					                    <div class=" event-body">
						       	            <p class="lead1">'.get_sub_field('title').'</p>
						                    <p class="small">'.get_sub_field('text').'</p>
					                    </div>
						            </div>
						            </div>
						            <!-- end of right event <-->
						            
						         ';
						}else{
							echo '
							<div class="row"><div class="event l-event col-md-6 col-sm-6 col-xs-11 ">                       
				                <div class="event-body">
				                    <p class="lead1">'.get_sub_field('title').'</p>
						            <p class="small">'.get_sub_field('text').'</p>
				                </div>
				                </div>
				                <!-- end of event body -->
				                
				            </div>';
						}
						
		        	?>
		            

		            <?php
		            $i++;
		            	endwhile;
				
						endif;
		            ?>
		            
		                   
		       	</div>
		        <!-- end of timeline events -->
		                <div class="clearfix"></div>
		            </div>
		        </div>
		    </div>
		</div>