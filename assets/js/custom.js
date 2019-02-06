jQuery(document).ready(function(){
  var scrollTop = 0;
  jQuery(window).scroll(function(){
    scrollTop = jQuery(window).scrollTop();
    jQuery('.counter').html(scrollTop);
    
    if (scrollTop >= 40) {
      jQuery('.navbar').addClass('scrolled-nav');
    } else if (scrollTop < 100) {
      jQuery('.navbar').removeClass('scrolled-nav');
    } 
    
    if (scrollTop >= 440) {
      jQuery('.left-sidebar .desktop').addClass('fixed');
    } else if (scrollTop < 400) {
      jQuery('.left-sidebar .desktop').removeClass('fixed');
    } 
    
  }); 
  
});


jQuery(document).ready(function(){
  
  /*Hamburger Menu*/
  jQuery('.hamburger').click(function(){
    jQuery('.hamburger').toggleClass('is-active');
    jQuery('.overlay').toggleClass('open');
  });

  jQuery('.close-menu-js').click(function(){
    jQuery('.hamburger').removeClass('is-active');
    jQuery('.overlay').removeClass('open');
  });
  
  jQuery( ".button-stories" ).on( "click", function(event) {
    event.preventDefault();  
    jQuery(this).toggleClass('open-stories');
    jQuery(this).closest('.bootcamp-stories-item').next('.bootcamp-stories-ajax').slideToggle();
  });
  

  /*3D Button effect*/
  jQuery('.button').on('mousedown',function() {
    jQuery(this).addClass('clicked');
  });
  jQuery('.button').on('mouseup',function() {
    jQuery(this).removeClass('clicked');
  });

});

jQuery(function() {
  jQuery('#bookmarkme').click(function(event) {
    event.preventDefault();
    if (window.sidebar && window.sidebar.addPanel) { // Mozilla Firefox Bookmark
      window.sidebar.addPanel(document.title, window.location.href, '');
    } else if (window.external && ('AddFavorite' in window.external)) { // IE Favorite
      window.external.AddFavorite(location.href, document.title);
    } else if (window.opera && window.print) { // Opera Hotlist
      this.title = document.title;
      return true;
    } else { // webkit - safari/chrome
      alert('Press ' + (navigator.userAgent.toLowerCase().indexOf('mac') != -1 ? 'Command/Cmd' : 'CTRL') + ' + D to bookmark this page.');
    }
  });
});

jQuery(document).ready( function () {
  var $form = jQuery('.newsletter-blog');
  
  if ( $form.length > 0 ) {
    jQuery('.newsletter-blog input[type=submit]').bind('click', function ( event ){
      if (event) event.preventDefault()
      register($form)
    });
  }
});

function register($form) {
  jQuery.ajax({
    type: $form.attr('method'),
    url: $form.attr('action'),
    data: $form.serialize(),
    cache       : false,
    dataType    : 'jsonp',
    contentType: "application/json; charset=utf-8",
    error       : function(err) { alert("Could not connect to the registration server. Please try again later."); },
    success    : function(data) {
      
      var form_name = $form.attr('id');
      
      console.log(form_name);
      
      if (data.result === 'success') {
        // Yeahhhh Success
        console.log(data.result)
        
        //jQuery('#'+form_name+' #mce-EMAIL').css('borderColor', '#ffffff')
        jQuery('#'+form_name+' #subscribe-result').css('color', 'rgb(53, 114, 210)')
        jQuery('#'+form_name+' #subscribe-result').html('<p>Thank you for subscribing. We have sent you a confirmation email.</p>')
        jQuery('#'+form_name+' #mce-EMAIL').val('')
        //      jQuery('#'+form_name+' #mce-responses .response').html('<span>' + data.msg + '</span>')
      } else {
        // Something went wrong, do something to notify the user.
        
        jQuery('#'+form_name+' #mce-FNAME').addClass('mce_inline_error');
        jQuery('#'+form_name+' #mce-EMAIL').addClass('mce_inline_error');
        jQuery('#'+form_name+' #subscribe-result').css('color', '#ff8282')
        if (data.msg == '0 - Please enter a value') {
          //do nothing
        } else {
          jQuery('#'+form_name+' #mce-responses .response').html('<span>' + data.msg + '</span>')
        }
        
      }
    }
  });
}

/*FILTER BOOTCAMP*/
jQuery(function() {
  jQuery( "#bootcamp-filter" ).change(function() {
    var bootcamp = jQuery(this).val();
    
    if (bootcamp=='0'){
      jQuery('.bootcamp-box').show("fast");
    }else{
      jQuery('.bootcamp-box').not('[data-id='+bootcamp+']').fadeOut("fast");
      jQuery('.bootcamp-box').filter('[data-id='+bootcamp+']').fadeIn("fast");    
    }
  });
  
  jQuery( "#bootcamp-location-filter" ).change(function() {
    var location = jQuery(this).val();
    
    if (location=='0'){
      jQuery('.bootcamp-box').show("fast");
    }else{
      jQuery('.bootcamp-box').not('[data-location='+location+']').fadeOut("fast");
      jQuery('.bootcamp-box').filter('[data-location='+location+']').fadeIn("fast");    
    }
  });
});
