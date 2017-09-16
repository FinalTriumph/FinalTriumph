/* global $ */
var lastScrollTop = 0;
$(window).scroll(function(event){
    var cst = $(this).scrollTop();
    if (cst > lastScrollTop){
        $("#header").fadeOut(300);
    } else {
        $("#header").fadeIn(300);
    }
    lastScrollTop = cst;
});

$(".foot_arrow_up").click(function() {
    $('html, body').animate({
        scrollTop: $('body').offset().top
    }, 1000);
});