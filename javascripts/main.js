$(function() {
    var $btnSearch = jQuery('.search-header button');
    var $inputForm = $btnSearch.closest('form.search-header').find('input[type=text]');

    $btnSearch.on('click',function(e){
      e.preventDefault();
      e.stopPropagation();
      var $searchForm = jQuery('#searchform');
      var $inputForm = jQuery(this).closest('form.search-header').find('input[type=text]');

      params = {opacity:1,width:"fast"};
      if($inputForm.hasClass('form-hide'))
      {
        $inputForm.focus().removeClass('form-hide');
        $inputForm.animate(params,500,function(){
          jQuery(this).css('display','inline-block').addClass('form-show');
          console.info('Animation show');
        });
      }
      else{
        $inputForm.removeClass('form-show');
        $inputForm.animate(params,500,function(){
          jQuery(this).css('display','none').addClass('form-hide');
          console.info('Animation hide');
        });

      }
    });

    $inputForm.blur(function(){
      params = {opacity:0,width:"fast"};
      jQuery(this).removeClass('form-show').animate(params,500,function(){
        jQuery(this).css('display','none').addClass('form-hide');
        console.info('Perte focus');
      });

    });


});
