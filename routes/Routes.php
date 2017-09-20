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

Route::set('project', function() {
    Project::singleProject();
});

Route::set('contact', function() {
    Controller::CreateView('Contact');
});

//Admin

Route::set('ka-ft-admin', function() {
    Controller::CreateView('Admin');
});

Route::set('ka-ft-admin-login', function() {
    Admin::login();
});

Route::set('ka-ft-admin-logout', function() {
    Admin::logout();
});

//Admin - projects

Route::set('ka-ft-admin-add-project', function() {
    Admin::addProject();
});

Route::set('ka-ft-admin-update-project', function() {
    Admin::updateProject();
});

Route::set('ka-ft-admin-delete-project', function() {
    Admin::deleteProject();
});

//Admin - events

Route::set('ka-ft-admin-add-event', function() {
    Admin::addEvent();
});

Route::set('ka-ft-admin-update-event', function() {
    Admin::updateEvent();
});

Route::set('ka-ft-admin-delete-event', function() {
    Admin::deleteEvent();
});

//API

Route::set('get-all-projects-api', function() {
    Portfolio::getProjects();
});

Route::set('get-single-project-api', function() {
    Project::getSingleProject();
});

Route::set('get-all-events-api', function() {
    About::getEvents();
});

//Email
Route::set('send-message', function() {
    Contact::sendMessage();
});



?>