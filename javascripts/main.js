$(function() {
    var $btnSearch = jQuery('.search-header button');
    $btnSearch.on('click',function(e){
      e.preventDefault();
      console.info('click on it');

      jQuery(this).closest('input[type=text]').val('test');

    });
});
