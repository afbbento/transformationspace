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
            <div class="person__overlay">
                <img class="person__img" src="<?php the_sub_field('image'); ?>">
            </div>
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
                <svg class="talk-icon" width="24" height="19" viewBox="0 0 24 19" fill="black" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M18.4861 8.43865C18.3384 8.29047 18.2539 8.08386 18.2539 7.87488C18.2539 7.66828 18.3384 7.46193 18.4861 7.31375C18.7814 7.01976 19.3117 7.01976 19.6044 7.31375C19.7521 7.46193 19.8363 7.66564 19.8363 7.87488C19.8363 8.08649 19.7521 8.29047 19.6044 8.43865C19.4594 8.58682 19.2536 8.67157 19.0451 8.67157C18.8396 8.67157 18.6337 8.58682 18.4861 8.43865ZM10.8984 7.89603C10.8984 7.45755 11.2527 7.10645 11.6897 7.10645H16.6764C17.1134 7.10645 17.4677 7.45755 17.4677 7.89603C17.4677 8.33451 17.1134 8.68561 16.6764 8.68561H11.6897C11.2527 8.68561 10.8984 8.33451 10.8984 7.89603ZM21.9124 12.6331H20.8345C20.5491 12.6331 20.3101 12.6886 20.1113 12.8945L17.7385 15.3269V13.5706C17.7385 12.986 17.1974 12.6331 16.6146 12.6331H9.39062V5.52686H21.9124V12.6331ZM5.05293 7.10618C4.61597 7.10618 4.1751 7.292 4.1751 7.73074V8.26713L3.28136 7.28937C3.1311 7.11882 2.95867 7.10618 2.73197 7.10618H1.56641V1.5791H10.9577V3.42146H8.47971C7.89719 3.42146 7.30554 4.12893 7.30554 4.71375V7.10618H5.05293ZM22.945 3.42153H12.7826V1.00093C12.7826 0.562446 12.2194 0 11.7824 0H0.791217C0.354261 0 0 0.562446 0 1.00093V7.73081C0 8.16929 0.354261 8.68541 0.791217 8.68541H2.37443L4.4593 10.9694C4.61243 11.1434 4.82948 11.1971 5.05174 11.1971C5.14591 11.1971 5.18896 11.1602 5.28026 11.1255C5.58756 11.0086 5.73913 10.6931 5.73913 10.363V8.68541H7.30435V13.5708C7.30435 14.1556 7.896 14.7389 8.47852 14.7389H15.6522V17.9412C15.6522 18.3725 15.8669 18.7605 16.2652 18.9226C16.3936 18.9745 16.505 19 16.638 19C16.9182 19 17.1817 18.9424 17.3843 18.7326L21.282 14.7389H22.945C23.5276 14.7389 24 14.1556 24 13.5708V4.71381C24 4.12899 23.5276 3.42153 22.945 3.42153Z"
                         />
                </svg>

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