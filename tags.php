


<?php 

require_once('../../../wp-load.php');
						
						if( have_rows('events', 404) ):
					
							while ( have_rows('events', 404 ) ) : the_row();   
							$select = get_sub_field_object('tags');
      						//echo $item_id = $select['name'];
							
							endwhile;
						endif;
						

						echo '[ { "value": "events_0_tags" , "text": "Development" }, { "value": "events_2_tags" , "text": "madrid" },  { "value": "events_3_tags" , "text": "Marketing" }  ]';
						
?>


