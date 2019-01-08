<?php 
/**
 * Template Name: Ajax Search tag 
 * */

?> 


<input type="text" value="" id="tags-input" data-role="tagsinput" />
    

<script>
    var cities = new Bloodhound({
  datumTokenizer: Bloodhound.tokenizers.obj.whitespace('text'),
  queryTokenizer: Bloodhound.tokenizers.whitespace,
   remote: {
        url: "wp-content/themes/transformationspace/tags.php",

      
        ajax : {
            beforeSend: function(jqXhr, settings){
               settings.data = jQuery.param({name: queryInput.val()})
               
            },
            type: "POST"

        }
    },
    filter: function(list) {
      jQuery.map(list, function(name) {
        return { name: name }; 

      });
    }
});
cities.initialize();

var elt = jQuery('#tags-input');
elt.tagsinput({
  itemValue: 'text',
  itemText: 'text',
  typeaheadjs: {
    name: 'cities',
    displayKey: 'text',
    source: cities.ttAdapter()
  }
});

jQuery('#tags-input').on('itemAdded', function(event) {
    //SHOW ALL AND HIDE WITHOUT ID
    console.log(event.item['value']);
    jQuery(".events-result > div:not(#events_0_tags)").hide();
});

</script>