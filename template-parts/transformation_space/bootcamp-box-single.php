<?php
/**
 * Template part for Single Box
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
 <div class="bordered-box bootcamp-box" data-id="<?php echo get_the_ID(); ?>" data-location="<?php the_field('bootcamp_location'); ?>" data-title="<?php the_field('title'); ?>">
            <div class="row display-flex">
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 ">
                    <div class="box title">
                        <h2><?php the_field('title'); ?></h2>
                        <p class="x-small"><?php the_field('sub_title'); ?></p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="box dates-label">
                        <div class="line visible-xs"></div>
                        <p class="x-small">dates:</p>                        
                        <div class="dates"><?php the_field('start_date'); ?> to <br> <?php the_field('end_date'); ?></div>
                        <a href="<?php the_permalink(); ?>" class="btn btn-blue btn-shadow hidden-xs"> enroll now</a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="box schedule">
                        <h3><?php the_field('weeks'); ?> weeks <br><?php the_field('days'); ?> days <span>a week</span></h3>
                        <div class="time"><?php the_field('schedule'); ?></div>
                        <div class="weekdays"><?php the_field('days_of_the_week'); ?></div>
                        <a href="<?php the_permalink(); ?>" class="btn btn-blue btn-shadow visible-xs"> enroll now</a>
                    </div>
                </div>
            </div>
        <div class="trapezoid hidden-xs">
            <p class="x-small"><?php the_field('box_bottom'); ?></p>
        </div>
        </div>