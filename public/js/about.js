/* global $ */

$(document).ready(function() {
    
    $.getJSON(window.location.origin + '/get-all-events-api', function(data) {
        for (var i = 0; i < data.length; i++) {
            //console.log(data[i]['time'] + ' | ' + data[i]['title']);
            $('#events_div').append('<div class="event_cont"><h3>'+data[i]['time']+'<br />'+data[i]['title']+'</h3><p>'+data[i]['description']+'</p><hr /><div>');
            $('#events_div_opp').prepend('<div class="event_cont"><h3>'+data[i]['time']+'<br />'+data[i]['title']+'</h3><p>'+data[i]['description']+'</p><hr /><div>');
        }
    });
    
    $('#sw_d_btn').click(function() {
        if ($('#events_div').is(':visible')) {
            $('#events_div').fadeOut(200, function() {
                $('#events_div_opp').fadeIn(200);
            });
        } else {
            $('#events_div_opp').fadeOut(200, function() {
                $('#events_div').fadeIn(200);
            });
        }
    });
});