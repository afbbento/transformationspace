<?php
/**
* Template part for Homepage Events
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
<section id="events" class="events">
    <div class="container">
        <div class="bordered-box">
            <div class="button-container separator-left">
                <button class="btn btn-black btn-large btn-shadow btn-lines">events</button>
            </div>
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <p>transformation.space is a Global EDTECH & Career Acceleration Company with campuses in São Paulo,
                        Barcelona, Madrid, Lisbon & Oporto. </p>
                    <div class="event-search">
                        <?php 
$taglist = '';
if( have_rows('events', 404) ):
    $i=0;
    $taglist .= '[';
    while ( have_rows('events', 404 ) ) : the_row();   
    
    while( have_rows('tags_repeater') ): the_row();
    
    $taglist .= '"'.get_sub_field('tags').'"';
    
    $taglist .= ',';
endwhile; 

endwhile;
$taglist = rtrim($taglist, ',');

$taglist .= ']';
endif;

?>

                        <script>
                        jQuery(document).ready(function() {

                            var list = <?php echo $taglist; ?>;
                            jQuery('[name=tags]').tagify({
                                duplicates: false,
                                enforceWhitelist: true,
                                autoComplete: true,
                                whitelist: list

                            }).on('add', function(e, tagName) {
                                
                                
                                var all_tags = jQuery('[name=tags]').data('tagify').value;
                                var all_items = jQuery('.event-item');

                                jQuery(".event-item").each(function(item) {

                                    jQuery.each(all_tags, function(index, value) {
                                        the_tag = all_tags[index].value;
                                    });
                                    
                                    var active = the_tag;
                                    all_items.hide().filter( "." + active ).fadeIn(450);


                                });
                            }).on('remove', function(e, tagName) {

                                var all_items = jQuery('.event-item');
                                all_items.fadeIn(450);

                            });

                        });
                        </script>
                        <?php	
                        $tags_values = '';
                        ?>
                        <form id="tags" method="post">
                            <input name="tags" placeholder="" value="<?php echo $tags_values; ?>">
                        </form>
                    </div>
                    <div class="events-result">

                        <?php 

if( have_rows('events', 404) ):
    
    while ( have_rows('events', 404 ) ) : the_row();   
    
    switch (strtolower(get_sub_field('city'))) {
        case 'lisboa':
        $bg = 'black';
        break;
        case 'porto':
        $bg = 'yellow';
        break;
        case 'madrid':
        $bg = 'blue';
        break;
    }
    $tags = '';
    while( have_rows('tags_repeater') ):
        the_row();
        $select = get_sub_field_object('select');
        $value = $select['value'];
        
        if(get_sub_field('tags')):
            $tags .= get_sub_field('tags');
          //  $tags .= ' ';
        endif;
    endwhile; 
    ?>

                        <div class="event-item bordered-box <?php echo $tags; ?>">
                            <div class="event-location <?php echo $bg; ?>">
                                <?php the_sub_field('city'); ?>
                            </div>
                            <div class="row align-vertical">
                                <div class="col-md-3">
                                    <div class="event-day"><?php the_sub_field('day'); ?></div>
                                    <div class="event-month"><?php the_sub_field('month'); ?></div>
                                </div>
                                <div class="col-md-7">
                                    <div class="event-item-text">
                                        <div class="lead3"><?php the_sub_field('title'); ?></div>
                                        <p class="small"><?php the_sub_field('text'); ?></p>
                                    </div>
                                </div>
                                <div class="col-md-2 align-center link-event">
                                    <a id="eventModal" data-fancybox data-src="#eventModal" href="javascript:;"
                                        class="button events-js btn-plus">
                                        <i class="fa fa-plus"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <?php
endwhile;
endif;
?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>