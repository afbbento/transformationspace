jQuery(document).ready(function ($) {

  document.addEventListener('wpcf7submit', function (e) {

    if ($("input").hasClass("wpcf7-not-valid")) {
      $("input.wpcf7-not-valid").parents("label").addClass("wpcf7-not-valid");
    }

    if ($("textarea").hasClass("wpcf7-not-valid")) {
      $("textarea.wpcf7-not-valid").parents("label").addClass("wpcf7-not-valid");
    }

  }, false);

  var yourName;
  var yourName2;
  var selectedBootcamp;

  $('.wpcf7 input[type=submit]').click(function (event) {

    yourName = jQuery('#moreInfoModal input[name="your-name"]').val();
    yourName2 = jQuery('#bootCampModal input[name="your-name"]').val();
    selectedBootcamp = jQuery('#bootCampModal .select-selected').text();
    // console.log(yourName2);
    $("label").removeClass("wpcf7-not-valid");
    $(".policyModal").removeClass("wpcf7-not-valid");

  });

  $('#aceptCheckbox input[type="checkbox"]').attr('id', 'acept');
  $('#aceptCheckbox2 input[type="checkbox"]').attr('id', 'acept2');
  $('#aceptCheckbox3 input[type="checkbox"]').attr('id', 'acept3');
  $('#aceptCheckbox input[type="checkbox"], #aceptCheckbox2 input[type="checkbox"], #aceptCheckbox3 input[type="checkbox"]').addClass(
    'checkbox checkbox--checkbox');

  $('#aceptCheckbox input[type="checkbox"], #aceptCheckbox2 input[type="checkbox"], #aceptCheckbox3 input[type="checkbox"]').attr( 'checked', 'checked' )

  $("#aceptCheckbox .wpcf7-list-item-label").replaceWith(
    "<label for='acept' class='checkbox__label'><span class='checkbox__text'><a class='policy-js' href='javascript:;'>Privacy &amp; Data Policy (required)</a></span></label>"
  );
  $("#aceptCheckbox2 .wpcf7-list-item-label").replaceWith(
    "<label for='acept2' class='checkbox__label'><span class='checkbox__text'><a class='policy-js' href='javascript:;'>Privacy &amp; Data Policy (required)</a></span></label>"
  );

  $("#aceptCheckbox3 .wpcf7-list-item-label").replaceWith(
    "<label for='acept3' class='checkbox__label'><span class='checkbox__text'><a class='policy-js' href='javascript:;'>Privacy &amp; Data Policy (required)</a></span></label>"
  );


  $('.policy-js').on('click', function () {
    jQuery.fancybox.open({
      src: '#policyModal',
      type: 'inline',
      opts: {
        afterShow: function (instance, current) {
          console.info('policy done!');
        }
      }
    });
  });

  // validate checkbox #moreInfoModal
  var moreInfoModal = document.querySelector('#moreInfoModal .wpcf7');

  if ( $(moreInfoModal).length ) {
    moreInfoModal.addEventListener('wpcf7submit', function (event) {
      if ($('#acept')[0].checked === false) {
        $(this).find(".policy-js").addClass("wpcf7-not-valid");
      }
    }, false);
  }

  // validate checkbox #bootCampModal
  var bootCampModal = document.querySelector('#bootCampModal .wpcf7');
  if ( $(bootCampModal).length ) {
  bootCampModal.addEventListener('wpcf7submit', function (event) {
    if ($('#acept2')[0].checked === false) {
      $(this).find(".policy-js").addClass("wpcf7-not-valid");
    }
  }, false);
  }

  if ( $(moreInfoModal).length ) {
  moreInfoModal.addEventListener('wpcf7mailsent', function (event) {
    //console.log(yourName);
    document.getElementById("your-name").innerHTML = yourName + '!';
    jQuery.fancybox.close()
    jQuery.fancybox.open({
      src: '#confirmationModal',
      type: 'inline',
      opts: {
        afterShow: function (instance, current) {
          console.info('confirmation more Info done!');
        }
      }
    });
  });
  }
  if ( $(bootCampModal).length ) {
  bootCampModal.addEventListener('wpcf7mailsent', function (event) {
    console.log(yourName2);
    console.log(selectedBootcamp);
    document.getElementById("your-name2").innerHTML = yourName2 + '!';
    document.getElementById("selected-bootcamp").innerHTML = selectedBootcamp + ' Bootcamp';
    jQuery.fancybox.close();

    jQuery.fancybox.open({
      src: '#confirmationModal2',
      type: 'inline',
      opts: {
        afterShow: function (instance, current) {
          console.info('confirmation bootcamp done!');
        }
      }
    });
  });
}

});