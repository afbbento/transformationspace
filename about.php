<?php
/*
Template Name: About
Template Post Type: post, page, event
*/

get_header(); 
$uploads_url = _wp_upload_dir_baseurl();
?>

<div class="header-section theme--dark"
    style="background-image:url('<?php echo _wp_upload_dir_baseurl(); ?>/2018/10/bg-homepage.png');">
    <div class="home-slider-container">
        <div class="home-slider" id="about-slider">
            <?php
				if( have_rows('header_slider') ):

				$rows_count = count(get_field('header_slider'));
				while ( have_rows('header_slider') ) : the_row();

					$title_ = explode(" ", get_sub_field('title'), 2);
        			$title  = '<span class="yellow-text">'.$title_[0].'</span> '.$title_[1];

				echo '
		    	<div>
		    	<div class="container">
		    		<div class="row">
		    			<div class="col-md-6 home-slider-left">
		    				<p class="lead1"><span class="circle-line white"></span><strong>about</strong></p>
		    				<h1>'.$title.'</h1>
							<p class="home-slider__text">'.get_sub_field('paragraph').'</p>
		    			</div>
		    			<div class="col-md-6">
		    				<div class="slider-image">';
		    				
		    					
		    				echo '<div class="frame">
		    						<div class="caption">
		    							<p class="caption__title"><strong>'.get_sub_field('image_caption_bold').'</strong></p>
		    							<p class="caption__text x-small">'.get_sub_field('image_caption').'</p>
		    						</div>
		    						<img src="'.get_sub_field('image').'">
		    					</div>';
		    				
		    				if ($rows_count>1){
		    					echo '<div class="slider-nav">		    							
			    							<button class="prev"><img src="'. $uploads_url .'/prev.png"></button>
											<div class="slider-nav__current-wrapper"><span class="yellow-circle current-slide"></span></div>
											<button class="next"><img src="'. $uploads_url .'/next.png"></button>								
									</div>';
		    				}

		    				echo '</div>
		    			</div>
		    		</div>
				</div>
			</div>';
				endwhile;
			else :
			    // no rows found

			endif;

			?>

        </div>
    </div>
</div><!-- #primary -->
<div class="bg-pattern-about"></div>

<script type="text/javascript">
/*About Slider*/
jQuery(document).ready(function($) {

    var slider = $('#about-slider');
    jQuery(slider).slick({
        dots: false,
        fade: true,
        nextArrow: jQuery('.next'),
        prevArrow: jQuery('.prev')
    });


    var slideCount = $(slider).slick("getSlick").slideCount;
    if (slideCount > 1) {
        $(slider).find(".frame").addClass("with-navigation");
    }

    jQuery('.current-slide').text('1');
    jQuery(slider).on('afterChange', function(event, slick, currentSlide, nextSlide) {
        jQuery('.current-slide').text(currentSlide + 1);
    });
});
</script>
<?php
	get_template_part( 'template-parts/transformation_space/section-about');
?>

<?php 
$transformation_content = get_field('transformation_section');
if( $transformation_content ):
?>

<section class="transform">
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <h1><?php echo $transformation_content['title']; ?><br>
                    <span class="blue">
                        <?php echo $transformation_content['title_blue'];?>
                    </span>
                </h1>
                <p class="small"><?php echo $transformation_content['paragraph']; ?></p>
                <div class="image-container"><img src="<?php echo $transformation_content['image']; ?>"></div>
                <div class="row">
                    <?php if( have_rows('transformation_columns') ): 
								while ( have_rows('transformation_columns') ) : the_row();
									if( get_row_layout() == 'column' ):
																
									echo '<div class="col-md-4">';
									echo '<p><strong>'.get_sub_field('title').'</strong></p>';
									echo '<p class="small">'.get_sub_field('text').'</p>';
									echo '</div>';							
									endif;
						    endwhile;
						else :
						    // no layouts found
						endif;
					?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>
<?php
	get_template_part( 'template-parts/transformation_space/banner-slider');
?>
<section class="team">
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <h1><?php the_field('magic'); ?><br><span class="blue"><?php the_field('section_magic_blue'); ?></span>
                </h1>
                <p class="small"><?php the_field('section_magic_text'); ?></p>
                <div class="row">
                    <div class="col-sm-6 col-sm-offset-3 col-md-6 col-md-offset-3 col-lg-5 col-lg-offset-3">
                        <?php
						if( have_rows('magic_rows') ):

                        while ( have_rows('magic_rows') ) : 
                        the_row(); ?>

                        <?php
                        $position = get_sub_field('image-position');

                        switch ($position):
                            case "left":
                                $class = 'pull-left';
                                $icon = '<svg width="146" height="162" viewBox="0 0 146 162" fill="none" xmlns="http://www.w3.org/2000/svg"> <path d="M73 144C112.212 144 144 112.212 144 73C144 33.7878 112.212 2 73 2C33.7878 2 2 33.7878 2 73C2 112.212 33.7878 144 73 144Z" fill="white" stroke="#4B5FF7" stroke-width="4" class="magic_circle"></path> <g class="inside"> <path d="M73.5618 85.8911C64.25 85.8911 56.7289 78.3537 56.7289 69.0217C56.7289 68.7824 56.7289 68.5431 56.7289 68.3038C55.2963 66.3896 53.8637 64.4753 52.6699 62.561C52.073 64.5949 51.7148 66.7485 51.7148 69.0217C51.7148 81.1055 61.5042 90.9161 73.5618 90.9161C75.472 90.9161 77.2627 90.6768 79.0534 90.1982C77.2627 88.7625 75.472 87.3268 73.5618 85.8911C73.6812 85.8911 73.6812 85.8911 73.5618 85.8911Z" fill="#A06AFF"/><path d="M73.5607 47.1274C72.3669 47.1274 71.2924 47.2471 70.218 47.3667C69.1435 47.4864 68.1885 47.7256 67.114 48.0846C66.3977 48.3239 65.6814 48.5631 64.9651 48.8024C63.7713 49.281 62.6969 49.8792 61.6224 50.597C59.1154 52.272 56.8471 54.4256 55.1758 56.938C56.0115 58.4934 57.0859 60.0487 58.1603 61.7237C60.7868 55.9809 66.6365 52.0327 73.4413 52.0327C82.7531 52.0327 90.2742 59.5702 90.2742 68.9022C90.2742 75.961 85.9765 81.9431 79.888 84.4556C81.4399 85.652 84.0663 87.9252 84.0663 87.9252L84.5439 87.6859C87.6478 85.7716 90.2742 83.1395 92.1844 80.0289C92.9006 78.9521 93.3782 77.7557 93.8557 76.4396C94.0945 75.8414 94.3332 75.1236 94.4526 74.5253C94.6914 73.8075 94.8108 73.0896 94.9301 72.3718C95.1689 71.1754 95.2883 70.0986 95.2883 68.9022C95.4077 56.938 85.6183 47.1274 73.5607 47.1274Z" fill="#4B5FF7"/><path d="M82.9918 86.8482C79.0522 83.7375 74.9932 80.0286 71.173 75.8412C68.9047 73.4484 66.7558 70.9359 64.7263 68.4234C63.8906 67.3466 64.01 65.6717 65.2038 64.8342C66.2783 63.9967 67.8302 64.236 68.6659 65.3127C70.576 67.7056 72.6055 70.0984 74.7544 72.4912C78.4553 76.4394 82.1561 79.909 85.9764 82.9L82.9918 86.8482Z" fill="#A06AFF"/><path d="M89.2021 79.7896C85.6206 76.9182 82.1585 73.5682 78.8158 69.979C78.4576 69.62 78.0995 69.1415 77.7413 68.7825C76.7863 67.7058 76.9057 66.1504 77.9801 65.1933C79.0546 64.3558 80.4871 64.3558 81.4422 65.4326C81.8004 65.7915 82.1585 66.1504 82.5166 66.629C85.74 70.0986 89.0827 73.2093 92.4254 76.0807L89.2021 79.7896Z" fill="#A06AFF"/><path d="M99.7038 59.2114C101.484 59.2114 102.927 57.7651 102.927 55.9811C102.927 54.197 101.484 52.7507 99.7038 52.7507C97.9236 52.7507 96.4805 54.197 96.4805 55.9811C96.4805 57.7651 97.9236 59.2114 99.7038 59.2114Z" fill="#FAFF00"/><path d="M94.6915 74.645C94.5721 75.3628 94.3333 75.961 94.0946 76.5592C93.617 77.7556 93.0201 78.9521 92.4232 80.1485C97.9148 88.5234 98.8699 94.0269 97.5567 95.3429C95.0496 97.8554 81.6788 92.1126 67.3529 77.7556C52.9076 63.3987 47.2966 49.9988 49.8037 47.4863C50.7587 46.5292 54.8177 46.6488 61.7419 50.597C62.8163 49.8792 63.8908 49.281 65.0846 48.8024C65.8009 48.5631 66.5172 48.2042 67.2335 48.0845C57.3248 41.7435 49.923 40.3079 46.2222 44.0167C39.7755 50.4774 50.1618 67.7058 63.7714 81.3449C74.5158 92.1126 87.5285 100.846 95.6465 100.846C97.7954 100.846 99.7055 100.248 101.019 98.8125C106.63 93.1894 98.9892 80.627 94.6915 74.645Z" fill="#FAFF00"/><path opacity="0.2" d="M50.5183 71.056C50.5183 83.1398 60.3077 92.9504 72.3653 92.9504C72.7234 92.9504 72.9622 92.9504 73.3204 92.9504C81.0802 98.9325 88.8401 103 94.451 103C96.5999 103 98.5101 102.402 99.8233 100.966C105.434 95.3432 97.7938 82.7809 93.496 76.7988C93.7348 76.0809 93.8541 75.3631 93.9735 74.6452C94.2123 73.4488 94.3317 72.372 94.3317 71.1756C94.0929 58.9722 84.4229 49.1616 72.3653 49.1616C71.1715 49.1616 70.097 49.2812 69.0226 49.4009C67.9481 49.5205 66.9931 49.7598 65.9186 50.1187C56.1293 43.7777 48.6082 42.342 45.0267 46.0509C40.6095 50.358 43.8329 59.5704 50.6377 69.2614C50.5183 69.8596 50.5183 70.4578 50.5183 71.056ZM56.6068 77.0381C58.3975 79.1916 60.427 81.3452 62.4565 83.3791C63.531 84.4558 64.7248 85.5326 65.7993 86.6094C61.6209 84.8148 58.2782 81.3452 56.6068 77.0381ZM48.4888 49.5205C49.4439 48.5634 53.5029 48.683 60.427 52.6312C57.92 54.3062 55.6517 56.4597 53.9804 58.9722C54.8161 60.5275 55.8905 62.0829 56.965 63.7579C59.5914 58.0151 65.4411 54.0669 72.2459 54.0669C81.5577 54.0669 89.0788 61.6043 89.0788 70.9364C89.0788 72.6113 88.8401 74.1667 88.3625 75.6024C85.8555 73.4488 83.4679 71.056 81.0802 68.4239C80.7221 68.065 80.3639 67.706 80.0058 67.2275C79.0507 66.2703 77.4987 66.1507 76.5437 66.9882C75.4692 67.9453 75.3499 69.5007 76.3049 70.5774C76.6631 70.9363 77.0212 71.4149 77.3794 71.7738C80.2445 74.8845 83.2291 77.6363 86.2137 80.1487C85.378 81.4648 84.3035 82.5416 83.2291 83.6183C79.8864 80.8666 76.6631 77.8756 73.4397 74.406C71.2908 72.0131 69.142 69.6203 67.3512 67.2275C66.5155 66.1507 64.9636 66.031 63.8891 66.7489C62.8147 67.5864 62.5759 69.2614 63.4116 70.3381C65.4411 72.8506 67.4706 75.3631 69.8583 77.7559C72.7234 80.8666 75.708 83.738 78.8119 86.3701C78.8119 86.3701 78.8119 86.3701 78.9313 86.4897C79.8864 87.3272 80.8414 88.0451 81.7965 88.7629C82.5128 89.3611 82.9903 89.8397 82.9903 89.8397L83.4679 89.6004C86.5718 87.6862 89.1982 85.0541 91.1083 81.9434C96.5999 90.3183 97.555 95.8218 96.2418 97.1378C93.7348 99.6503 80.3639 93.9075 66.038 79.5505C51.7121 65.4328 45.9818 52.1526 48.4888 49.5205Z" fill="#4B5FF7"/><path opacity="0.2" d="M98.3913 61.2451C100.171 61.2451 101.615 59.7988 101.615 58.0147C101.615 56.2307 100.171 54.7844 98.3913 54.7844C96.6111 54.7844 95.168 56.2307 95.168 58.0147C95.168 59.7988 96.6111 61.2451 98.3913 61.2451Z" fill="#FAFF00"/> </g> <path fill-rule="evenodd" clip-rule="evenodd" d="M72.5 160C82.7173 160 91 151.717 91 141.5C91 131.283 82.7173 123 72.5 123C62.2827 123 54 131.283 54 141.5C54 151.717 62.2827 160 72.5 160Z" fill="#4B5FF7" stroke="white" stroke-width="3" class="DQBEAByc_9"></path> <path fill-rule="evenodd" clip-rule="evenodd" d="M70.8261 147.875C70.6322 148.069 70.318 148.069 70.1246 147.875C70.1166 147.864 65.1469 142.898 65.1469 142.898C64.951 142.702 64.951 142.385 65.1469 142.189C65.3429 141.993 65.6595 141.993 65.8555 142.189L70.4824 146.816L80.1526 137.145C80.3465 136.952 80.6611 136.952 80.8546 137.145C81.0485 137.339 81.0485 137.654 80.8546 137.847L70.8261 147.875Z" fill="none" stroke="none" class="magic_correct"></path></svg>';
                                break;
                            case "right":
                                $class = 'pull-right';
                                $icon = '<svg width="146" height="162" viewBox="0 0 146 162" fill="none" xmlns="http://www.w3.org/2000/svg"> <path d="M73 144C112.212 144 144 112.212 144 73C144 33.7878 112.212 2 73 2C33.7878 2 2 33.7878 2 73C2 112.212 33.7878 144 73 144Z" fill="white" stroke="#4B5FF7" stroke-width="4" class="magic_circle"></path> <g class="inside"> <path d="M91.3984 79.8H81.7984V75.8H89.5984V69.1V69L80.3984 59.8L83.1984 57L93.1984 67C93.4984 67.3 93.5984 67.6 93.5984 68V77.6C93.6984 78.8 92.6984 79.8 91.3984 79.8Z" fill="#4B5FF7" class="VzNIOyLi_3"></path> <path d="M64.9 79.8H55.3C54 79.8 53 78.8 53 77.5V68C53 67.6 53.2 67.3 53.4 67L63.4 57L66.2 59.8L57.1 69V69.1V75.8H64.9V79.8Z" fill="#4B5FF7" class="VzNIOyLi_4"></path> <path d="M77.8008 58.6999H68.8008C68.8008 56.2999 70.7008 54.3999 73.1008 54.3999H73.5008C75.9008 54.3999 77.8008 56.2999 77.8008 58.6999Z" fill="#A06AFF" class="VzNIOyLi_5"></path> <path d="M78.7984 43.2L77.6984 42.1C76.5984 40.8 74.9984 40 73.1984 40C71.3984 40 69.7984 40.8 68.6984 42.2L67.7984 43.3C64.5984 47.2 62.8984 52.2 62.8984 57.3V82.7C62.8984 83.8 63.7984 84.7 64.8984 84.7C65.9984 84.7 66.8984 83.8 66.8984 82.7V80.7V70.7V56.3C66.8984 52.7 68.0984 49.2 70.3984 46.4L73.2984 42.7L76.1984 46.4C78.3984 49.2 79.6984 52.7 79.6984 56.3V70.6V80.6V82.6C79.6984 83.7 80.5984 84.6 81.6984 84.6C82.7984 84.6 83.6984 83.7 83.6984 82.6V57.2C83.6984 52.1 81.9984 47.2 78.7984 43.2Z" fill="#FAFF00" class="VzNIOyLi_6"></path> <path d="M73.3984 84.6001C72.2984 84.6001 71.3984 83.7001 71.3984 82.6001V70.1001H75.3984V82.6001C75.3984 83.7001 74.4984 84.6001 73.3984 84.6001Z" fill="#A06AFF" class="VzNIOyLi_7"></path> <path d="M88.4023 89.7C87.3023 89.7 86.4023 88.8 86.4023 87.7V83.5C86.4023 82.4 87.3023 81.5 88.4023 81.5C89.5023 81.5 90.4023 82.4 90.4023 83.5V87.7C90.4023 88.8 89.5023 89.7 88.4023 89.7Z" fill="#4B5FF7" class="VzNIOyLi_8"></path> <path d="M58.3008 89.7C57.2008 89.7 56.3008 88.8 56.3008 87.7V83.5C56.3008 82.4 57.2008 81.5 58.3008 81.5C59.4008 81.5 60.3008 82.4 60.3008 83.5V87.7C60.3008 88.8 59.4008 89.7 58.3008 89.7Z" fill="#4B5FF7" class="VzNIOyLi_9"></path> <path opacity="0.2" d="M92.7 79.3001V69.7001C92.7 69.3001 92.5 69.0001 92.3 68.7001L82.7 59.1001V58.9001C82.7 53.8001 81 48.9001 77.8 44.9001L76.7 43.8001C75.6 42.4001 73.9 41.6001 72.2 41.6001C70.5 41.6001 68.8 42.4001 67.7 43.8001L66.7 45.0001C63.5 48.9001 61.8 53.9001 61.8 59.0001V59.3001L52.4 68.7001C52.1 69.0001 52 69.3001 52 69.7001V79.3001C52 80.6001 53 81.6001 54.3 81.6001H61.9V84.4001C61.9 85.5001 62.8 86.4001 63.9 86.4001C65 86.4001 65.9 85.5001 65.9 84.4001V82.4001V72.4001V58.0001C65.9 54.4001 67.1 50.9001 69.4 48.1001L72.3 44.4001L75.2 48.1001C77.4 50.9001 78.7 54.4001 78.7 58.0001V72.3001V82.3001V84.3001C78.7 85.4001 79.6 86.3001 80.7 86.3001C81.8 86.3001 82.7 85.4001 82.7 84.3001V81.5001H90.4C91.6 81.5001 92.7 80.5001 92.7 79.3001ZM56 77.5001V70.8001V70.7001L61.8 64.9001V77.5001H56ZM88.7 77.5001H82.7V64.7001L88.7 70.7001V70.8001V77.5001Z" fill="#4B5FF7" class="VzNIOyLi_10"></path> <path opacity="0.2" d="M72.3992 56.1001H71.9992C69.5992 56.1001 67.6992 58.0001 67.6992 60.4001H76.6992C76.6992 58.1001 74.7992 56.1001 72.3992 56.1001Z" fill="#FF6AD4" class="VzNIOyLi_11"></path> <path opacity="0.2" d="M72.3008 86.3C73.4008 86.3 74.3008 85.4 74.3008 84.3V71.8H70.3008V84.3C70.3008 85.4 71.2008 86.3 72.3008 86.3Z" fill="#FF6AD4" class="VzNIOyLi_12"></path> <path opacity="0.2" d="M85.3984 85.3V89.5C85.3984 90.6 86.2984 91.5 87.3984 91.5C88.4984 91.5 89.3984 90.6 89.3984 89.5V85.3C89.3984 84.2 88.4984 83.3 87.3984 83.3C86.2984 83.3 85.3984 84.2 85.3984 85.3Z" fill="#4B5FF7" class="VzNIOyLi_13"></path> <path opacity="0.2" d="M55.3008 85.3V89.5C55.3008 90.6 56.2008 91.5 57.3008 91.5C58.4008 91.5 59.3008 90.6 59.3008 89.5V85.3C59.3008 84.2 58.4008 83.3 57.3008 83.3C56.2008 83.3 55.3008 84.2 55.3008 85.3Z" fill="#4B5FF7" class="VzNIOyLi_14"></path> </g> <path fill-rule="evenodd" clip-rule="evenodd" d="M72.5 160C82.7173 160 91 151.717 91 141.5C91 131.283 82.7173 123 72.5 123C62.2827 123 54 131.283 54 141.5C54 151.717 62.2827 160 72.5 160Z" fill="#4B5FF7" stroke="white" stroke-width="3" class="DQBEAByc_9"></path> <path fill-rule="evenodd" clip-rule="evenodd" d="M70.8261 147.875C70.6322 148.069 70.318 148.069 70.1246 147.875C70.1166 147.864 65.1469 142.898 65.1469 142.898C64.951 142.702 64.951 142.385 65.1469 142.189C65.3429 141.993 65.6595 141.993 65.8555 142.189L70.4824 146.816L80.1526 137.145C80.3465 136.952 80.6611 136.952 80.8546 137.145C81.0485 137.339 81.0485 137.654 80.8546 137.847L70.8261 147.875Z" fill="none" stroke="none" class="magic_correct"></path></svg>';
                                break;
                            case "left2":
                                $class = 'pull-left';
                                $icon = '<svg width="146" height="162" viewBox="0 0 146 162" fill="none" xmlns="http://www.w3.org/2000/svg"> <path d="M73 144C112.212 144 144 112.212 144 73C144 33.7878 112.212 2 73 2C33.7878 2 2 33.7878 2 73C2 112.212 33.7878 144 73 144Z" fill="white" stroke="#4B5FF7" stroke-width="4" class="magic_circle"></path> <g class="inside"> <path d="M75.4016 94.7L72.6016 91.9C74.4016 90.1 74.5016 87.2 72.8016 85.3C71.9016 84.3 71.5016 82.9 71.8016 81.6C72.0016 80.3 72.8016 79.1 74.0016 78.5L75.0016 78C78.9016 75.9 83.4016 75.5 87.6016 77.1C88.8016 77.5 89.9016 78.1 90.9016 78.9L94.1016 81.1L91.8016 84.3L88.6016 82C87.8016 81.5 87.0016 81 86.1016 80.7C83.1016 79.6 79.7016 79.8 76.8016 81.4L75.8016 81.9C75.6016 82 75.6016 82.2 75.5016 82.3C75.5016 82.4 75.5016 82.6 75.6016 82.7C78.7016 86.2 78.6016 91.4 75.4016 94.7Z" fill="#FAFF00"/> <path d="M62.7008 78.1C61.6008 78.1 60.5008 77.8 59.5008 77.3C56.2008 75.6 54.8008 71.6 56.3008 68.2C56.8008 67.1 56.8008 65.9 56.4008 64.8C56.0008 63.7 55.1008 62.8 54.1008 62.4L52.3008 61.6L53.8008 58L55.6008 58.8C57.7008 59.7 59.2008 61.4 60.0008 63.4C60.8008 65.5 60.7008 67.8 59.8008 69.8C59.1008 71.3 59.7008 73 61.2008 73.8C62.0008 74.2 62.8008 74.3 63.6008 74C64.4008 73.7 65.0008 73.2 65.4008 72.4L65.6008 72.1L66.5008 70.8C68.5008 67.9 72.0008 66.4 75.5008 66.8H75.8008L76.1008 67C78.9008 68.4 82.3008 67.9 84.6008 65.6L85.8008 64.4C85.8008 64.4 85.9008 64.3 85.9008 64.2C85.9008 64.1 85.9008 64.1 85.8008 64L81.8008 60.7C80.0008 59.2 79.6008 56.6 80.9008 54.7L81.1008 54.5L84.9008 51.5L87.4008 54.6L84.2008 57.2C84.2008 57.4 84.2008 57.6 84.4008 57.7L88.4008 61C89.3008 61.7 89.9008 62.8 89.9008 64C90.0008 65.2 89.5008 66.3 88.7008 67.2L87.5008 68.4C84.1008 71.8 79.1008 72.6 74.8008 70.7C72.8008 70.6 70.9008 71.5 69.8008 73.1L69.0008 74.3C68.2008 76 66.7008 77.2 65.0008 77.8C64.2008 78 63.4008 78.1 62.7008 78.1Z" fill="#8F68FD"/> <path d="M73.1016 96C59.3016 96 48.1016 84.8 48.1016 71C48.1016 57.2 59.3016 46 73.1016 46C86.9016 46 98.1016 57.2 98.1016 71C98.1016 84.8 86.8016 96 73.1016 96ZM73.1016 50C61.5016 50 52.1016 59.4 52.1016 71C52.1016 82.6 61.5016 92 73.1016 92C84.7016 92 94.1016 82.6 94.1016 71C94.1016 59.4 84.6016 50 73.1016 50Z" fill="#4B5FF7"/> <path opacity="0.2" d="M72 47.7C58.2 47.7 47 58.9 47 72.7C47 86.5 58.2 97.7 72 97.7C85.8 97.7 97 86.5 97 72.7C97 58.9 85.8 47.7 72 47.7ZM72 51.7C75.8 51.7 79.3 52.7 82.4 54.5L80.2 56.3L80 56.5C78.7 58.4 79.1 61 80.9 62.5L84.9 65.7999C84.9 65.7999 85 65.9 85 66C85 66.1 85 66.1 84.9 66.2L83.7 67.4C81.5 69.6 78.1 70.1999 75.2 68.7999L74.9 68.6H74.6C71.1 68.2 67.6 69.7 65.6 72.6L64.7 73.9L64.5 74.2C64.1 75 63.5 75.5 62.7 75.7999C61.9 76.0999 61 76 60.3 75.6C58.9 74.8 58.3 73.1 58.9 71.6C59.8 69.6 59.9 67.3 59.1 65.2C58.3 63.2 56.9 61.6 55 60.7C58.7 55.3 64.9 51.7 72 51.7ZM76.3 93.2999C77.4 90.3999 76.8 86.9 74.7 84.5C74.6 84.2999 74.6 84.1999 74.6 84.0999C74.6 84 74.7 83.7999 74.9 83.7L75.9 83.2C78.7 81.6 82.1 81.4 85.2 82.5C86.1 82.7999 86.9 83.2999 87.7 83.7999L89.3 84.9C86.1 89.1 81.6 92.2 76.3 93.2999ZM91.1 81.4L89.8 80.5C88.8 79.7999 87.6 79.2 86.5 78.7C82.4 77.1 77.8 77.4999 73.9 79.5999L72.9 80.0999C71.7 80.7999 70.9 81.9 70.7 83.2C70.5 84.5 70.8 85.9 71.7 86.9C73.4 88.8 73.3 91.7 71.5 93.5C60.2 93.5 51 84.2 51 72.7C51 69.6 51.7 66.7 52.9 64.1H53C54.1 64.6 54.9 65.4 55.3 66.5C55.7 67.6 55.7 68.7999 55.2 69.9C53.7 73.2999 55.1 77.2999 58.4 79C59.4 79.5 60.5 79.7999 61.6 79.7999C62.4 79.7999 63.1 79.7 63.9 79.4C65.7 78.8 67.1 77.6 67.9 75.9L68.7 74.7C69.8 73.1 71.7 72.1999 73.7 72.2999C78 74.2999 83 73.4 86.4 70L87.6 68.7999C88.4 68 88.9 66.8 88.8 65.6C88.7 64.4 88.2 63.3 87.3 62.6L83.3 59.3C83.1 59.2 83.1 59 83.1 58.8L85.7 56.7C90.1 60.6 93 66.2 93 72.6C93 75.8 92.3 78.8 91.1 81.4Z" fill="#4B5FF7"/> </g> <path fill-rule="evenodd" clip-rule="evenodd" d="M72.5 160C82.7173 160 91 151.717 91 141.5C91 131.283 82.7173 123 72.5 123C62.2827 123 54 131.283 54 141.5C54 151.717 62.2827 160 72.5 160Z" fill="#4B5FF7" stroke="white" stroke-width="3" class="DQBEAByc_9"></path> <path fill-rule="evenodd" clip-rule="evenodd" d="M70.8261 147.875C70.6322 148.069 70.318 148.069 70.1246 147.875C70.1166 147.864 65.1469 142.898 65.1469 142.898C64.951 142.702 64.951 142.385 65.1469 142.189C65.3429 141.993 65.6595 141.993 65.8555 142.189L70.4824 146.816L80.1526 137.145C80.3465 136.952 80.6611 136.952 80.8546 137.145C81.0485 137.339 81.0485 137.654 80.8546 137.847L70.8261 147.875Z" fill="none" stroke="none" class="magic_correct"></path></svg>';
                                break;

                        endswitch;
                        ?>

                        <div class="row-vector in-view-js">
                            <div class="image-container <?php echo $class; ?>">
                                <?php echo $icon; ?>
                            </div>
                            <div class="text fade animated delay-1s">
                                <div class="lead2"><?php the_sub_field('title') ?></div>
                                <p class="small"><?php the_sub_field('text') ?></p>
                            </div>
                        </div>


                        <?php 
					    
						    endwhile;

						else :

						    // no rows found

						endif;

						?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<?php 
$image_banner = get_field('image_banner');	
if( $image_banner ):
?>
<div class="container-fluid banner-image">
    <div class="row flex v-center">
        <div class="col-md-6 col-sm-12 visible-xs"
            style="margin-bottom: 40px; height: 300px;background-blend-mode: lighten;background-color: #4B5FF7;background-size: cover;background-image: url('<?php echo $image_banner['image']; ?>')">
        </div>
        <div class="col-md-6 col-sm-12">
            <div class="col-lg-7 col-md-8 col-sm-10 col-lg-offset-3 col-md-offset-2 col-sm-offset-1">
                <div class="text-container">
                    <h3><?php echo $image_banner['title']; ?></h3>
                    <div class="simple-line"></div>
                    <p><?php echo $image_banner['text']; ?></p>
                </div>
            </div>
        </div>
        <div class="button-container">
            <a href="#" class="btn btn-yellow btn-shadow"><strong>get courses guide</strong></a>
        </div>
        <div class="col-md-6 col-sm-12 hidden-xs"
            style="background-blend-mode: lighten;background-color: #4B5FF7;height: 100%;background-size: cover;background-image: url('<?php echo $image_banner['image']; ?>')">
        </div>
    </div>
</div>

<?php endif; ?>


<section class="where">
    <div class="container">
        <div class="col-md-10 col-md-offset-1">
            <?php 
				$section_find_us = get_field('section_find_us');	
				if( $section_find_us ):
				?>
            <h1><?php echo $section_find_us['title']; ?><br><span
                    class="blue"><?php echo $section_find_us['title_blue']; ?></span></h1>
            <p class="small"><?php echo $section_find_us['paragraph']; ?></p>
            <?php endif; ?>
            <?php
			$contact_locations_page = 165;
			$variable = get_field('locations', $contact_locations_page);
			if( have_rows('locations', $contact_locations_page) ): 

				while( have_rows('locations', $contact_locations_page) ): the_row();
				?>
            <div class="row row-location">
                <div class="col-md-4">
                    <div class="address-box theme-light">
                        <div class="location"><?php the_sub_field('location'); ?></div>
                        <p class="small">
                            <strong><?php the_sub_field('address'); ?></strong>
                            <br><?php the_sub_field('postal_code'); ?>
                        </p>

                        <p class="small phone">
                            <img src="<?php bloginfo('template_url'); ?>/assets/images/phone.png">
                            <a class="link" href="tel:<?php echo get_sub_field('phone'); ?>">
                                <?php echo get_sub_field('phone'); ?>
                            </a>
                        </p>
                        <p class="small email"><img src="<?php bloginfo('template_url'); ?>/assets/images/mail.png">
                            <a class="link" href="mailto:<?php echo get_sub_field('email'); ?>">
                                <?php echo get_sub_field('email'); ?>
                            </a>
                        </p>
                    </div>
                </div>
                <div class="location_1 col-md-4 hidden-sm hidden-xs"
                    style="height: 211px;background-image: url('<?php the_sub_field('image_1'); ?>')"></div>
                <div class="col-md-4 hidden-sm hidden-xs" style="transform: translateY(66px);"><img
                        src="<?php the_sub_field('image_2'); ?>"></div>
            </div>

            <?php endwhile; ?>
            <?php endif; ?>

        </div>
    </div>
</section>

<section class="who theme--light">
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <?php 
				$section_who = get_field('section_who');	
				if( $section_who ):
				?>
                <h1><?php echo $section_who['title']; ?><br><span
                        class="blue"><?php echo $section_who['title_blue']; ?></span></h1>
                <p class="small"><?php echo $section_who['paragraph']; ?></p>
                <?php endif; ?>
                <?php
				get_template_part( 'template-parts/transformation_space/persons');
				?>
            </div>
        </div>
    </div>
</section>


<script src="<?php echo bloginfo('template_url'); ?>/assets/js/intersection-observer-polyfill.js"
    type="text/javascript"></script>

<script>
window.addEventListener("load", function(event) {


    myElement = document.querySelectorAll('.in-view-js');


    if ('IntersectionObserver' in window) {
        // LazyLoad images using IntersectionObserver
        createObserver();
    } else {
        jQuery(myElement).addClass('in-view');
        jQuery(myElement).find(".image-container").addClass('fadeInAfter');
        jQuery(myElement).find(".text").addClass('fadeIn');
    }




}, false);


function createObserver() {
    var observer;

    var options = {
        root: null,
        rootMargin: "0px",
        threshold: 0.5
    };

    observer = new IntersectionObserver(handleIntersect, options);
    myElement.forEach(element => {
        observer.observe(element);
    });
}


function handleIntersect(entries, observer) {
    entries.forEach(function(entry) {
        if (entry.intersectionRatio > 0) {
            entry.target.classList.add('in-view');
            jQuery(entry.target).find(".image-container").addClass('fadeInAfter');
            jQuery(entry.target).find(".text").addClass('fadeIn');
        }

        prevRatio = entry.intersectionRatio;
    });
}
</script>

<?php get_footer();