<?php

Route::set('index.php', function() {
    Controller::CreateView('Index');
});

Route::set('about', function() {
    Controller::CreateView('About');
});

Route::set('portfolio', function() {
    Controller::CreateView('Portfolio');
});

Route::set('contact', function() {
    Controller::CreateView('Contact');
});

Route::set('ka-ft-admin', function() {
    Controller::CreateView('Admin');
});

Route::set('ka-ft-admin-login', function() {
    Admin::login();
});

Route::set('ka-ft-admin-logout', function() {
    Admin::logout();
});

Route::set('ka-ft-admin-add-project', function() {
    Admin::addProject();
});

Route::set('ka-ft-admin-update-project', function() {
    Admin::updateProject();
});

Route::set('ka-ft-admin-delete-project', function() {
    Admin::deleteProject();
});

//

Route::set('ka-ft-admin-add-event', function() {
    Admin::addEvent();
});

Route::set('ka-ft-admin-update-event', function() {
    Admin::updateEvent();
});

Route::set('ka-ft-admin-delete-event', function() {
    Admin::deleteEvent();
});

//

Route::set('get-all-projects-api', function() {
    Portfolio::getProjects();
});

Route::set('get-all-events-api', function() {
    About::getEvents();
});



?>