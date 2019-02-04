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
if ( $post ):
	$categories = get_the_category( $post->ID );


$team_page = 187;

if(!empty( $categories)) {
	$category = $categories[0]->slug;
	if($category=='bootcamp'){
		$team_page = '';
	}
}

$variable = get_field('team', $team_page);
endif;


$i = 1;
if( have_rows('team', $team_page) ): 
	while( have_rows('team', $team_page) ): the_row();
	
	if($i % 2 == 0){
		$image_position = "left";
	}else{
		$image_position = "right";
	}
	?>
<div class="row person big <?php echo $image_position; ?>">
    <div class="col-md-12">
        <div class="frame">
            <img src="<?php the_sub_field('image'); ?>">
        </div>
        <div class="text-container">
            <p class="lead1"><?php the_sub_field('name'); ?></p>
            <p class="small"><?php the_sub_field('position'); ?></p>
            <div class="col-md-12">
                <ul class="social-links">
                    <?php
					if (get_sub_field('fb')): ?>
                    <li>
                        <a target="_blank" href="<?php the_sub_field('fb'); ?>" class="">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                    </li>
                    <?php
					endif;
					if (get_sub_field('linkedin')): ?>
                    <li>
                        <a target="_blank" href="<?php the_sub_field('linkedin'); ?>" class="">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                    </li>
                    <?php
					endif;
					if (get_sub_field('twitter')): ?>
                    <li>
                        <a target="_blank" href="<?php the_sub_field('twitter'); ?>" class="">
                            <i class="fab fa-twitter"></i>
                        </a>
                    </li>
                    <?php endif; ?>
                </ul>
            </div>
            <p class="clearfix">
                <?php the_sub_field('bio'); ?>
            </p>
            <a href="#" class="btn btn-transparent btn-icon">
				<img src="<?php echo $theme_url; ?>/assets/images/talk-icon.svg">
				talk to Victor
			</a>
        </div>
    </div>
</div>
<?php
$i++;
endwhile; 
endif; 
?>