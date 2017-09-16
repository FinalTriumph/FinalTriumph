/* global $ */

$('#show_projects').click(function() {
    $('#toggle_events').hide(200, function() {
        $('#toggle_projects').show(200);
    });
});

$('#show_events').click(function() {
    $('#toggle_projects').hide(200, function() {
        $('#toggle_events').show(200);
    });
});