<?php
/**
* The template for displaying the footer
*
* Contains the closing of the #content div and all content after.
*
* @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
*
* @package WordPress
* @subpackage transformationspace
* @since 1.0
* @version 1.2
*/

?>

</div><!-- #content -->

<footer id="footer" class="footer theme--dark" role="contentinfo">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 col-lg-offset-1 col-md-12 pb-50">
                <div class="row foot">
                    <div class="col-md-3 col-sm-6">
                        <?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
                        <div id="primary-sidebar" class="primary-sidebar widget-area" role="complementary">
                            <?php dynamic_sidebar( 'footer-1' ); ?>
                        </div><!-- #primary-sidebar -->
                        <?php endif; ?>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <?php if ( is_active_sidebar( 'footer-2' ) ) : ?>
                        <div id="primary-sidebar" class="primary-sidebar widget-area" role="complementary">
                            <?php dynamic_sidebar( 'footer-2' ); ?>
                        </div><!-- #primary-sidebar -->
                        <?php endif; ?>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="newsletter-box bordered-box">
                            <p class="x-small"><strong>SIGN OUR NEWSLETTER</strong></p>
                            <label>Enter your email</label>
                            <form
                                action="https://space.us19.list-manage.com/subscribe/post-json?u=f8fa948d2036f4f4fef049cfc&id=7aa7fb0215&c=?"
                                method="get" id="newsletter-footer" name="mc-embedded-subscribe-form"
                                class="form-inline validate form-newsletter-js newsletter-footer" target="_blank">
                                <input id="mce-EMAIL" name="EMAIL" type="email" required=""
                                    placeholder="<?php pll_e('Your e-mail here'); ?>">
                                <input class="btn btn-yellow submit" name="subscribe" type="submit"
                                    value="<?php pll_e('Get started'); ?>">
                                <div id="mce-responses" class="clear">
                                    <p class="response"></p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="row address">
                    <?php 
                $contact_locations_page = 165;
                $variable = get_field('locations', $contact_locations_page);
                if( have_rows('locations', $contact_locations_page) ): 
                    while( have_rows('locations', $contact_locations_page) ): 
                        the_row();
                        ?>
                    <div class="col-md-3 col-sm-6">
                        <div class="lead1 upper text-left"><?php echo get_sub_field('location'); ?></div>
                        <div class="address-box theme--light">
                            <p class="small address">
                                <img src="<?php echo _wp_upload_dir_baseurl(); ?>/location-icon.svg">
                                <strong><?php echo get_sub_field('address'); ?></strong>
                            </p>
                            <p><?php echo get_sub_field('postal_code'); ?></p>

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
                    <?php endwhile; ?>
                    <?php endif; ?>

                </div>
            </div>
        </div>
        <?php get_template_part( 'template-parts/footer/footer', 'bottom' ); ?>
    </div><!-- .wrap -->
</footer><!-- #footer -->
</div><!-- .site-content-contain -->
</div><!-- #page -->

<?php get_template_part( 'template-parts/modals/modal', 'moreinfo' ); ?>
<?php get_template_part( 'template-parts/modals/modal', 'bootcamp' ); ?>
<?php get_template_part( 'template-parts/modals/modal', 'data-policy' ); ?>

<?php wp_footer(); ?>


<!-- fire loading animation  -->
<script type="text/javascript">
var myVar;

function init() {
    myVar = setTimeout(showContent, 1000);
    loadGifs();
}

function showContent() {
    var element = document.getElementById("tp-progress-indicator");
    element.classList.add("available");
}
</script>


<!-- set canvas loader on forms -->
<script>
jQuery(document).ready(function($) {

    $('#register .ajax-loader').each(function(index) {
        var str1 = "ajax-loader";
        var id = str1.concat(index);
        $(this).attr('id', id);


        var cl = new CanvasLoader(id);
        cl.setColor('#4958fb');
        cl.setShape('spiral');
        cl.setDiameter(30);
        cl.setDensity(77);
        cl.setRange(1);
        cl.setSpeed(5);
        cl.show();


    });



});
</script>

<!-- JS for custom select box -->
<script>
var x, i, j, selElmnt, a, b, c;
/*look for any elements with the class "custom-select":*/
x = document.getElementsByClassName("custom-select");
for (i = 0; i < x.length; i++) {
    selElmnt = x[i].getElementsByTagName("select")[0];
    /*for each element, create a new DIV that will act as the selected item:*/
    a = document.createElement("DIV");
    a.setAttribute("class", "select-selected");
    a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
    x[i].appendChild(a);
    /*for each element, create a new DIV that will contain the option list:*/
    b = document.createElement("DIV");
    b.setAttribute("class", "select-items select-hide");
    for (j = 1; j < selElmnt.length; j++) {
        /*for each option in the original select element,
        create a new DIV that will act as an option item:*/
        c = document.createElement("DIV");
        c.setAttribute("class", j);
        c.innerHTML = selElmnt.options[j].innerHTML;
        c.addEventListener("click", function(e) {
            /*when an item is clicked, update the original select box,
            and the selected item:*/
            var y, i, k, s, h;
            s = this.parentNode.parentNode.getElementsByTagName("select")[0];
            h = this.parentNode.previousSibling;
            for (i = 0; i < s.length; i++) {
                if (s.options[i].innerHTML == this.innerHTML) {
                    s.selectedIndex = i;
                    h.innerHTML = this.innerHTML;
                    y = this.parentNode.getElementsByClassName("same-as-selected");
                    for (k = 0; k < y.length; k++) {
                        y[k].classList.remove("same-as-selected");
                    }
                    this.classList.add("same-as-selected");
                    break;
                }
            }
            h.click();
        });
        b.appendChild(c);
    }
    x[i].appendChild(b);
    a.addEventListener("click", function(e) {
        /*when the select box is clicked, close any other select boxes,
        and open/close the current select box:*/
        e.stopPropagation();
        closeAllSelect(this);
        this.nextSibling.classList.toggle("select-hide");
        this.classList.toggle("select-arrow-active");
    });
}

function closeAllSelect(elmnt) {
    /*a function that will close all select boxes in the document,
    except the current select box:*/
    var x, y, i, arrNo = [];
    x = document.getElementsByClassName("select-items");
    y = document.getElementsByClassName("select-selected");
    for (i = 0; i < y.length; i++) {
        if (elmnt == y[i]) {
            arrNo.push(i)
        } else {
            y[i].classList.remove("select-arrow-active");
        }
    }
    for (i = 0; i < x.length; i++) {
        if (arrNo.indexOf(i)) {
            x[i].classList.add("select-hide");
        }
    }
}
/*if the user clicks anywhere outside the select box,
then close all select boxes:*/
document.addEventListener("click", closeAllSelect);
</script>



<script>
/* defer loading gifs - success modals */
function loadGifs() {
    var imgDefer = document.getElementsByTagName('img');
    for (var i = 0; i < imgDefer.length; i++) {
        if (imgDefer[i].getAttribute('data-src')) {
            imgDefer[i].setAttribute('src', imgDefer[i].getAttribute('data-src'));
        }
    }
}
</script>


<script>
// random gif on modal
window.GLOBAL_URL = "<?php bloginfo('template_url');?>";
jQuery(document).ready(function($) {
    var images = ['face-1.gif', 'face-2.gif', 'face-3.gif'];
    var href = GLOBAL_URL + '/' + images[Math.floor(Math.random() * images.length)];
    //console.log(href);
    $(".random-faces").attr("src", href);
});
</script>


<!-- scroll to anchor if on homepage -->
<?php if ( is_front_page() ) : ?>
<script>
jQuery(document).ready(function($) {

    var navList = $('.anchor-link');

    $(navList).on('click', 'a:not(.selected)', function(e) {

        navList.removeClass("selected");
        $(e.currentTarget).parent().addClass("selected");


        var href = jQuery(this).attr('href');
        var target = jQuery(this.hash); // Set the target as variable
        // console.log(href);
        // console.log($target);

        var targetOffset;

        // test if has anchor
        if (/#/.test(href)) {
            /* do not run AJAX function */
            e.preventDefault(); // prevent hard jump, the default behavior
            targetOffset = target.position().top - 100;

            // if target is valid, scroll to
            if (target && targetOffset != '') {
                jQuery('html, body').animate({
                    scrollTop: targetOffset
                }, {
                    easing: 'easeInOutQuart',
                    duration: 850,
                    complete: function() {}
                });
            }

        } else {
            /* run the AJAX function */
            //console.log(" not anchor");
        }

    });
});
</script>



<?php endif; ?>


</body>

</html>