/* global $ */

$(document).ready(function() {
    
    var expanded = 0;
    var eventCount;
    
    var lastScrollTop;
    
    $.getJSON(window.location.origin + '/get-all-events-api', function(data) {
        eventCount = data.length;
        for (var i = 0; i < data.length; i++) {
            var event = '<div class="event_cont"><h3 class="event_h3" data-id="'+data[i]['id']+'">'+data[i]['time']+'<span class="event_h_sep"> | </span>'+data[i]['title']+'</h3><div class="event_desc" id="'+data[i]['id']+'"><p>'+data[i]['description']+'</p></div><div>';
            $('#events_div').append(event);
            var eventOpp = '<div class="event_cont"><h3 class="event_h3" data-id="opp'+data[i]['id']+'">'+data[i]['time']+'<span class="event_h_sep"> | </span>'+data[i]['title']+'</h3><div class="event_desc" id="opp'+data[i]['id']+'"><p>'+data[i]['description']+'</p></div><div>';
            $('#events_div_opp').prepend(eventOpp);
        }
        $('.event_h3').click(function(){
            var $desc = $("#" + $(this).attr('data-id'));
            if ($desc.is(':visible')) {
                $desc.slideUp(300);
                expanded -= 1;
                $('#exp_all_btn, #exp_all_btn2').removeClass('cl_exp_btn_inact');
                if (expanded === 0) {
                    $('#cl_all_btn, #cl_all_btn2').addClass('cl_exp_btn_inact');
                }
            } else {
                $desc.slideDown(300);
                expanded += 1;
                $('#cl_all_btn, #cl_all_btn2').removeClass('cl_exp_btn_inact');
                if (expanded === eventCount) {
                    $('#exp_all_btn, #exp_all_btn2').addClass('cl_exp_btn_inact');
                }
            }
        });
        
        $(document).imagesLoaded( function() {
            $('#spinner_wrapper, .spinner').hide();
            $("#about_content").css("opacity", '1');
            
        });
    });
    
    
    $('#sw_d_btn, #sw_d_btn2').click(function() {
        if ($('#events_div').is(':visible')) {
            $('#events_div').fadeOut(200, function() {
                $(".event_desc").hide();
                $('#events_div_opp').fadeIn(200);
            });
        } else {
            $('#events_div_opp').fadeOut(200, function() {
                $(".event_desc").hide();
                $('#events_div').fadeIn(200);
            });
        }
        expanded = 0;
        
        $('#cl_all_btn, #cl_all_btn2').addClass('cl_exp_btn_inact');
        $('#exp_all_btn, #exp_all_btn2').removeClass('cl_exp_btn_inact');
    });
    
    $('#exp_all_btn, #exp_all_btn2').click(function() {
        
        var reset = false;
            
        if ($(this).attr('id') === 'exp_all_btn2') {
            $(window).unbind();
            reset = true;
        }
        
        if ($('#events_div').is(':visible')) {
            $('#events_div > .event_cont > .event_desc').slideDown(300);
        } else {
            $('#events_div_opp > .event_cont > .event_desc').slideDown(300);
        }
        
        if (reset) {
            $('html, body').animate({
                scrollTop: $('#ab_bottom_cont_div').offset().top
            }, 300);
            
            setTimeout(function() {
                lastScrollTop = 0;
                
                $(window).scroll(function(event){
                    var cst = $(this).scrollTop();
                    if (cst > lastScrollTop){
                        $("#header").fadeOut(300);
                    } else {
                        $("#header").fadeIn(300);
                    }
                    lastScrollTop = cst;
                });
            }, 300);
        }
        
        $('#exp_all_btn, #exp_all_btn2').addClass('cl_exp_btn_inact');
        $('#cl_all_btn, #cl_all_btn2').removeClass('cl_exp_btn_inact');
        
        expanded = eventCount;
    });
    
    $('#cl_all_btn, #cl_all_btn2').click(function() {
        var reset = false;
            
        if ($(this).attr('id') === 'cl_all_btn2') {
            $(window).unbind();
            reset = true;
        }
        
        if ($('#events_div').is(':visible')) {
            $('#events_div > .event_cont > .event_desc').slideUp(300);
        } else {
            $('#events_div_opp > .event_cont > .event_desc').slideUp(300);
        }
        
        $('#cl_all_btn, #cl_all_btn2').addClass('cl_exp_btn_inact');
        $('#exp_all_btn, #exp_all_btn2').removeClass('cl_exp_btn_inact');
        
        if (reset) {
            setTimeout(function() {
                lastScrollTop = 0;
                
                $(window).scroll(function(event){
                    var cst = $(this).scrollTop();
                    if (cst > lastScrollTop){
                        $("#header").fadeOut(300);
                    } else {
                        $("#header").fadeIn(300);
                    }
                    lastScrollTop = cst;
                });
            }, 300);
        }
        
        expanded = 0;
    });
});