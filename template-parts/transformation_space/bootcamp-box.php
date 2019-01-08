<?php
/**
 * Template part for Bootcamp Box
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

if ( is_single() ) {

    get_template_part( 'template-parts/transformation_space/bootcamp-box-single');
              
}else{
    // args
    $args = array(
        'category_name' => 'Bootcamp',
    );
    $the_query = new WP_Query( $args );

    if( $the_query->have_posts() ): 
        
        while( $the_query->have_posts() ) : $the_query->the_post(); 
            get_template_part( 'template-parts/transformation_space/bootcamp-box-single');
        endwhile;
    endif;
    wp_reset_query();  
}
?>


