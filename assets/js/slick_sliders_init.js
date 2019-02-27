/*Home Slider*/


/*Stories Slider*/
jQuery(document).ready(function () {
  jQuery('.stories-slider').slick({
    dots: true,
    arrows: false,
    slidesToShow: 2,
    slidesToScroll: 1,
    appendDots: jQuery(".slick-nav-stories"),
    customPaging: function (slider, i) {
      return jQuery('<button class="black-dots" type="button" />').text(i + 1);
    },
    responsive: [{
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
          centerMode: true,
          slidesToShow: 1,
          slidesToScroll: 1,
          infinite: false,
          dots: true,
          centerPadding: '60px'
        },
      },
      {
        breakpoint: 480,
        settings: {
          centerMode: true,
          slidesToShow: 1,
          slidesToScroll: 1,
          infinite: false,
          dots: true,
          centerPadding: '0px'
        },
      }
      // You can unslick at a given breakpoint now by adding:
      // settings: "unslick"
      // instead of a settings object
    ]
  });
});

/*General Article Slider*/
jQuery(document).ready(function ($) {
  var articleSlider = jQuery('.article-slider');

  $(articleSlider).on('init', function (event, slick, currentSlide, nextSlide) {

    $('.bs-wizard-dot-2').click(function (event) {
      console.log("clicked");
      event.preventDefault();
      var current = currentSlide + 1;
      articleSlider.slick('slickNext');
    });

  });

  $(articleSlider).slick({
    dots: true,
    speed: 500,
    fade: true,
    arrows: false,
    customPaging: function (slider, i) {
      return $('<button class="black-dots" type="button" />').text(i + 1);
    },
    responsive: [

      {
        breakpoint: 767,
        settings: {
          dots: false
        }
      }
    ]
  });

  $('.bs-wizard-dot[data-slide]').click(function(e) {
    e.preventDefault();
    var slideNr = $(this).data('slide') - 1;
    //console.log(slideNr);
    $(articleSlider).slick('slickGoTo', slideNr);
    $('.bs-wizard-step').removeClass('active');
    $(this).parent().addClass('active');
  });

  $(articleSlider).on('afterChange', function (event, slick, currentSlide, nextSlide) {
    var current = currentSlide + 1;
    $('.bs-wizard-step').removeClass('active');
    $('.row.bs-wizard div:nth-child(' + current + ')').addClass('active');
  });





});

//IMPORTANT:Remove "Fade", if it's a slide effect 
/*Blog Text Slider*/
jQuery(document).ready(function () {
  jQuery('.blog-text-slider').slick({
    dots: false,
    speed: 500,
    slidesToShow: 2,
    arrows: true,
    slidesToScroll: 1,
    nextArrow: jQuery('.next'),
    prevArrow: jQuery('.prev'),
    responsive: [{
      breakpoint: 1100,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
        infinite: true,
        dots: true
      }
    }]
  });
});

//IMPORTANT:Remove "Fade", if it's a slide effect 
/*Blog Text Slider*/
jQuery(document).ready(function () {
  jQuery('#banner-slider').slick({
    dots: false,
    speed: 500,
    autoplay: true,
    slidesToShow: 1,
    arrows: true,
    slidesToScroll: 1,
    prevArrow: '<button class="slick-btn-left"><img src="' + GLOBAL_URL + '/assets/images/arrow-prev.png"></button>',
    nextArrow: '<button class="slick-btn-right"><img src="' + GLOBAL_URL + '/assets/images/arrow-next.png"></button>',
    responsive: [{
      breakpoint: 992,
      settings: {
        arrows: false
      }
    }]
  });
});