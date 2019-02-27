<?php
/**
 * The blog post page
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Transformation Space
 * @since 1.0
 * @version 1.0
 */

?>

<div class="bg-pattern"></div>
<header class="blog">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="breadcrumbs white">
                    <span class="level0"><span class="circle-line white"></span>blog </span><i
                        class="fas fa-chevron-right"></i><span class="level1"><?php echo get_the_title(); ?> </span>
                </div>

            </div>
        </div>
        <div class="row">
            <div class="col-sm-11 col-xs-12">
                <dir class="row header-text">
                    <div class="col-sm-9">
                        <p class="x-small upper yellow-text"><strong>Agile methodologies</strong></p>
                        <h1 class="blog-title"><?php echo get_the_title(); ?></h1>
                        <div class="post-meta">
                            <ul>
                                <li>
                                    <p class="x-small"><?php echo transformationspace_posted_on(); ?></p>
                                </li>
                                <li class="likes">
                                    <p class="x-small">
                                        <?php 
										if (function_exists('wp_ulike_get_post_likes')):
											echo wp_ulike_get_post_likes(get_the_ID());
										endif;
									?>
                                    </p>
                                </li>

                                <?php $post_object = get_post( get_the_ID() );	?>
                                <li class="read-time">
                                    <p class="x-small"><?php echo estimate_time_read($post_object->post_content); ?>
                                        read</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-3 author-col">
                        <img src="<?php echo _wp_upload_dir_baseurl(); ?>/blog-author.png" alt="Avatar">
                        <p><?php 

							$author_id = get_post_field( 'post_author', get_the_ID() );
							$fname = get_the_author_meta( 'first_name', $author_id );
							$lname = get_the_author_meta( 'last_name', $author_id );
							$author_bio = get_the_author_meta( 'description', $author_id );
							
							echo $fname." ".$lname;
						?>
                        </p>
                        <p class="x-small"><?php the_field('user_position', 'user_'. $author_id ); ?></p>
                    </div>
                </dir>
            </div>
        </div>
    </div>
</header>
<div class="container-fluid pb-40">
    <div class="sticky-top hidden-xs hidden-sm">
        <div class="left-sidebar">
            <div>
                <?php echo do_shortcode('[wp_ulike]');?>
            </div>
            <div>
                <a class="round-btn bookmark" id="bookmarkme" href="#"></a>
            </div>
            <div class="social-share">
                <?php echo do_shortcode( '[social_warfare button_shape="flat_fresh"]' ); ?>
            </div>
        </div>
    </div>
    <div class="container main-container">
        <div class="row">
            <div class="col-md-7 col-md-offset-1">
                <main id="main" class="site-main" role="main">

                    <?php
					if ( have_posts() ) :

						/* Start the Loop */
						while ( have_posts() ) : the_post();

							/*
							 * Include the Post-Format-specific template for the content.
							 * If you want to override this in a child theme, then include a file
							 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
							 */
							get_template_part( 'template-parts/post/content', get_post_format() );

						endwhile;

						the_posts_pagination( array(
							'prev_text' => transformationspace_get_svg( array( 'icon' => 'arrow-left' ) ) . '<span class="screen-reader-text">' . __( 'Previous page', 'transformationspace' ) . '</span>',
							'next_text' => '<span class="screen-reader-text">' . __( 'Next page', 'transformationspace' ) . '</span>' . transformationspace_get_svg( array( 'icon' => 'arrow-right' ) ),
							'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'transformationspace' ) . ' </span>',
						) );

					else :

						get_template_part( 'template-parts/post/content', 'none' );

					endif;

					?>
                    <div class="left-sidebar visible-xs visible-sm">
                        <div class="social-wrapper">
                            <?php echo do_shortcode('[wp_ulike]');?>
                            <a class="round-btn bookmark" id="bookmarkme" href="#"></a>
                            <?php echo do_shortcode( '[social_warfare button_shape="flat_fresh"]' ); ?>
                        </div>
                    </div>
                    <div class="blog-bottom">
                        <img src="<?php echo _wp_upload_dir_baseurl(); ?>/blog-bottom-1.png">
                    </div>
                    <div class="author-meta">
                        <div class="row">
                            <div class="col-md-2">
                                <div class="author-img">
                                    <?php echo do_shortcode( '[avatar]' ); ?>
                                </div>
                            </div>
                            <div class="col-md-10">
                                <div class="author-text">
                                    <p><?php echo $fname." ".$lname; ?></p>
                                    <p class="x-small"><?php echo $author_bio; ?></p>
                                    <ul class="social-links">
                                        <li><a target="_blank"
                                                href="<?php the_field('facebook_link', 'user_'. $author_id ); ?>"
                                                class=""><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a target="_blank" href="http://linkedin.com" class=""><i
                                                    class="fab fa-linkedin-in"></i></a></li>
                                        <li><a target="_blank" href="http://twitter.com" class=""><i
                                                    class="fab fa-twitter"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>


                    </div>
                </main><!-- #main -->
            </div><!-- #col -->
            <div class="col-md-4 custom-sidebar hidden-sm hidden-xs">
                <?php get_sidebar(); ?>
            </div>
        </div>
    </div><!-- .container -->
</div><!-- .container-fluid -->

<div class="container theme--light hidden-sm hidden-xs">
    <div class="row related-posts-row">
        <div class="col-md-11">
            <h1>where you can<br><span class="blue">find more</span></h1>
            <?php
				get_template_part( 'template-parts/transformation_space/related-posts');
			?>
        </div>
    </div>

</div><!-- .container -->