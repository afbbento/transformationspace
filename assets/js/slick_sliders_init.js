/*Home Slider*/


/*Stories Slider*/
jQuery(document).ready(function(){
  jQuery('.stories-slider').slick({
      dots: true,
      arrows: false,
      slidesToShow: 2,
      slidesToScroll: 1,
      appendDots:jQuery(".slick-nav-stories"),
      customPaging: function(slider, i) {
        return jQuery('<button class="black-dots" type="button" />').text(i + 1);
      },
      responsive: [
      {
        breakpoint: 1200,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
          infinite: true,
          dots: true
        }
      },
      {
        breakpoint: 992,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
          infinite: true,
          dots: true
        }
      }
      // You can unslick at a given breakpoint now by adding:
      // settings: "unslick"
      // instead of a settings object
    ]
  });
});

/*General Article Slider*/
jQuery(document).ready(function(){
  jQuery('.article-slider').slick({
      dots: true,
      speed: 500,
      fade: true,
      arrows: false,
      customPaging: function(slider, i) {
        return jQuery('<button class="black-dots" type="button" />').text(i + 1);
      },
      responsive:[
      
      {
        breakpoint: 767,
        settings: {
          dots: false
        }
      }
      ]
  });
});

//IMPORTANT:Remove "Fade", if it's a slide effect 
/*Blog Text Slider*/
jQuery(document).ready(function(){
  jQuery('.blog-text-slider').slick({
      dots: false,
      speed: 500,
      slidesToShow: 2,
      arrows: true,
      slidesToScroll: 1,
      nextArrow: jQuery('.next'),
      prevArrow: jQuery('.prev'),
      responsive: [
      {
        breakpoint: 1100,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
          infinite: true,
          dots: true
        }
      }
    ]
  });
});

//IMPORTANT:Remove "Fade", if it's a slide effect 
/*Blog Text Slider*/
jQuery(document).ready(function(){
  jQuery('#banner-slider').slick({
      dots: false,
      speed: 500,
      slidesToShow: 1,
      arrows: true,
      slidesToScroll: 1,
      prevArrow: '<button class="slick-btn-left"><img src="/wp-content/uploads/arrow-prev.png"></button>',
      nextArrow: '<button class="slick-btn-right"><img src="/wp-content/uploads/arrow-next.png"></button>',
      responsive: [
      {
        breakpoint: 992,
        settings: {
          arrows: false
        }
      }
    ]
  });
});
