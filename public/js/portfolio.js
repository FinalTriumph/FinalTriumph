/* global $ */

//Modified version from https://www.w3schools.com/w3css/w3css_slideshow.asp
    
var slideIndex = 2;
var slideShow;
var firstTimeout;

function startSlideShow() {
    showDivs(slideIndex += 1);
    slideShow = setTimeout(startSlideShow, 3000);
}

function plusDivs(n) {
    clearTimeout(firstTimeout);
    clearTimeout(slideShow);
    showDivs(slideIndex += n);
    slideShow = setTimeout(startSlideShow, 3000);
}

function currentDiv(n) {
    clearTimeout(firstTimeout);
    clearTimeout(slideShow);
    showDivs(slideIndex = n);
    slideShow = setTimeout(startSlideShow, 3000);
}

function showDivs(n) {
    var slides = document.getElementsByClassName("mySlides");
    var dots = document.getElementsByClassName("slide_s");
    if (n > slides.length) {
        slideIndex = 1;
    }
    if (n < 1) {
        slideIndex = slides.length;
    }
    for (var i = 0; i < slides.length; i++) {
        $(slides[i]).fadeOut(500);
    }
    for (var j = 0; j < dots.length; j++) {
        dots[j].className = dots[j].className.replace(" slide_s_selected", "");
    }
    $(slides[slideIndex - 1]).fadeIn(500);
    dots[slideIndex - 1].className += " slide_s_selected";
}

//////////

$(document).ready(function() {
    
    $.getJSON(window.location.origin + '/get-all-projects-api', function(data) {
        for (var i = 0; i < data.length; i++) {
            var project = '<div class="project_div"><div class="front"><img src="'+data[i]['image']+'" class="project_img" /></div> <div class="back"><img src="'+data[i]['image']+'" class="project_img" /><div class="project_img_back"><h3>'+data[i]['title']+'</h3><a href="#" class="back_link">Description</a><a href="'+data[i]['link']+'" class="back_link" target="_blank">View Project</a></div></div></div>';
            switch (data[i]['category']) {
                case 'new': 
                    $('#new_projects').append(project);
                    break;
                case 'fccfe':
                    $('#fccfe_projects').append(project);
                    break;
                case 'fccdv':
                    $('#fccdv_projects').append(project);
                    break;
                case 'fccbe':
                    $('#fccbe_projects').append(project);
                    break;
                default:
                    alert('Error: Something went wrong while getting projects from database.');
            }
            $(".project_div").flip({ trigger: "hover", 	reverse: true, });
        }
    });
});

$(document).imagesLoaded( function() {
    firstTimeout = setTimeout(startSlideShow, 3000);
    $("#slider_div").css("opacity", '1');
    $("#all_projects_div").css('opacity', '1');
    $('#spinner_wrapper, .spinner').hide();
});