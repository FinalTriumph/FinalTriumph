/* global $ */

$(document).ready(function() {
    
    $(document).imagesLoaded(function() {
        $("#spinner_wrapper, .spinner").hide();
        $("#cent_d").css("opacity", "1");
    });
    
    $('.bottom_inline').hover(function() {
        $('.welcome_img', this).css('opacity', '1');
        $(this).css('background-color', '#ddd');
        $(this).css('background-color', 'rgba(130, 130, 130, 0.1)');
        $(this).css('box-shadow', '0px 2px 5px -3px rgba(100,100,100,0.75)');
        $(this).css('-webkit-box-shadow', '0px 2px 5px -3px rgba(100,100,100,0.75)');
        $(this).css('-moz-box-shadow', '0px 2px 5px -3px rgba(100,100,100,0.75)');
        $(this).css('border-color', 'rgba(0, 0, 0, 0.3)');
    }, function() {
        $('.welcome_img', this).css('opacity', '0');
        $(this).css('background-color', '');
        $(this).css('border-color', 'rgba(0, 0, 0, 0');
        $(this).css('box-shadow', 'none');
        
    });
    
});
