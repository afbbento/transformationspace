 <div class="row other-guests">
     <h2>
         <span class="circle-line"></span>
         other guests
     </h2>
     <?php
    if( have_rows('other_guests') ):
        $rows_count = count(get_field('other_guests'));
        
        $i = 1;
        while ( have_rows('other_guests') ) : the_row();
        
        if($i % 2 == 0){
            $position = 'col-sm-offset-5';
        } else {
            $position = '';
        } ?>
     <div class="row">
         <div class="col-sm-6 person <?php echo $position; ?> small">
             <div class="row">
                 <div class="col-sm-6">
                     <div class="frame">
                         <div class="person__overlay">
                             <img src="<?php the_sub_field('image'); ?>">
                         </div>
                     </div>
                 </div>
                 <div class="col-sm-6">
                     <p class="lead1"><?php the_sub_field('name'); ?></p>
                     <ul class="social-links">
                         <?php if (get_sub_field('fb')){
                            echo '<li><a target="_blank" href="'.get_sub_field('fb').'" class=""><i class="fab fa-facebook-f"></i></a></li>';
                            }
                            if (get_sub_field('linkedin')){
                                echo '<li><a target="_blank" href="'.get_sub_field('linkedin').'" class=""><i class="fab fa-linkedin-in"></i></a></li>';
                            }
                            if (get_sub_field('twitter')){
                                echo '<li><a target="_blank" href="'.get_sub_field('twitter').'" class=""><i class="fab fa-twitter"></i></a></li>';
                            }
                            echo '</ul>' 
                            ?>
                         <p class="small"><?php the_sub_field('bio'); ?></p>
                 </div>
             </div>
         </div>
     </div>
    <?php
    $i++;
    endwhile;
    endif;
    ?>
 </div>