<?php
/**
 * Template part for displaying Stories
 *
 * Used in Front page and Bootcamps
 *
 * 
 *
 * @package WordPress
 * @subpackage Transformation Space
 * @since 1.0
 * @version 1.2
 */

?>

<section class="stories">
    <div class="container all-stories">
        <div class="row">

            <?php 
		         		$args = array(
						    'category_name' => 'Stories',
						    'posts_per_page'   => 1,
						);
						// query
						$the_query = new WP_Query( $args );
					 if( $the_query->have_posts() ): 
						 while( $the_query->have_posts() ) : $the_query->the_post(); 
						 $video_ID = get_field('vimeo_video_id');
		         	?>

            <div class="col-md-10 col-md-offset-1">
                <div class="bordered-box lined-box">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="video-container">
                                <div class="play-button-outer big">
                                    <a data-fancybox="" data-width="640" data-height="360"
                                        href="https://vimeo.com/<?php the_field('vimeo_video_id'); ?>">
                                        <div class="play-button"></div>
                                    </a>
                                </div>
                                <img src="<?php the_field('video_cover'); ?>">
                            </div>
                            <div class="image-label">Team<?php echo get_sub_field('video_caption'); ?></div>
                        </div>
                        <div class="col-md-4">
                            <h1>Stories</h1>
                            <p><?php the_field('text'); ?></p>
                            <div class="btn-container text-center"><a href="stories"
                                    class="btn btn-yellow btn-shadow">discover more</a></div>
                        </div>
                    </div>

                </div>
            </div>


            <?php 
						endwhile;
						wp_reset_query(); 
						endif; ?>

        </div>
        <div class="row">
            <div class="col-lg-12 col-lg-offset-0 col-md-7 col-md-offset-2 text-center">

                <div class="stories-slider-container">
                    <div class="lead1">more stories</div>
                    <div class="stories-slider">

											<?php
										// query 
										$args = array(
											'post_type' => 'Stories',
											'post_status' => 'publish',
										);
										
											$the_query = new WP_Query( $args );
											if( $the_query->have_posts() ): 
												while( $the_query->have_posts() ) : $the_query->the_post(); 
												$video_ID = get_field('vimeo_video_id');
												?>

                        <div class="row">
                            <!-- <div class="col-md-6 col-sm-6 col-sx-6 image-container visible-xs">
                                <div class="play-button-outer small">
                                    <a data-fancybox data-width="640" data-height="360"
                                        href="https://vimeo.com/<?php the_field('vimeo_video_id'); ?>">
                                        <img src="<?php the_field('video_cover'); ?>">
                                    </a>
                                </div>
                            </div> -->
                            <div class="col-md-6 col-sm-6 col-sx-6">
                                <div class="text-container">
                                    <div class="lead3"><?php the_title(); ?></div>
                                    <p class="small"><?php echo create_excerpt(get_field('text'), 84); ?></p>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-sx-6 image-container"
                                style="background-image: url('<?php the_field('video_cover'); ?>');">
                                <div class="play-button-outer small">
                                    <a data-fancybox data-width="640" data-height="360"
                                        href="https://vimeo.com/<?php the_field('vimeo_video_id'); ?>">
                                        <div class="play-button"></div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <?php 
						endwhile;
						wp_reset_query(); 
						endif; ?>


                    </div>
                    <div class="slick-nav-stories col-xs-1 mb-40"></div>
                </div>
            </div>
        </div>
    </div>
</section>