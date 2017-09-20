/* global $ */

$('#send_message_form').submit(function(e) {
    e.preventDefault();
    $("input, textarea").attr('disabled', 'disabled');
    $("#send_m_btn").fadeOut(function() {
        $("#sending_m_btn").show();
    });
    
    var messageString = "nocsrf=" + $('input[name=nocsrf]').val() + "&name="+ $('input[name=name]').val() + "&email=" + $('input[name=email]').val() + "&subject=" + $('input[name=subject]').val() + "&message=" + $('textarea[name=message]').val();
    
    console.log('sending');
    $.ajax({
        type: "POST",
        url: '/send-message',
        data: messageString,
        success: function(data) {
            if (data === "Success") {
                $("#popup").show();
                $("#sending_m_btn").html('Message Sent!');
            } else {
                alert(data);
            }
        },
        error: function(data) {
            alert('Error while sending message (more in console)');
            console.log(data);
        }
    });
});

$("#popup, #popup_message, #popup_ok").click(function() {
    $("#popup_message").fadeOut(500);
    window.location = window.origin + "/contact"; 
});