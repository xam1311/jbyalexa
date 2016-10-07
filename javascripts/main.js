$(function() {
    var $btnSearch = jQuery('.search-header button');
    $btnSearch.on('click',function(e){
      e.preventDefault();
      var $inputForm = jQuery(this).closest('form.search-header').find('input[type=text]');

      if($inputForm.hasClass('form-hide'))
      {
        params = {opacity:1,width:"fast"};
        $inputForm.removeClass('form-hide');
        $inputForm.animate(params,500,function(){
          $inputForm.css('display','inline-block').addClass('form-show');
          console.info('Animation show');
        });
      }
      else{
        params = {opacity:0,width:"fast"};
        $inputForm.removeClass('form-show');
        $inputForm.animate(params,500,function(){
          jQuery(this).css('display','none').addClass('form-hide');
          console.info('Animation hide');
        });
      }


    });
});
