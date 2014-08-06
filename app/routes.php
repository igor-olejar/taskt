<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get("/", array(
    'before'    => 'auth',
    'uses'      =>  'HomeController@showOptions'
));

Route::get("login", array('uses' => 'LoginController@showLogin'));
Route::post("login", array('uses' => 'LoginController@doLogin'));

Route::get("about", function(){
    return View::make('about')->withTitle('About');
});

Route::get("logout", function(){
    CheckinController::closeAll();
    Auth::logout();
    return Redirect::to('login');
});

Route::get("signup", array('uses' => 'UserController@createUser'));
Route::post("signup", array(
    'uses'  =>  'UserController@saveUser',
    'as'    =>  'user.save'
));

// Projects
Route::get("projects", array('as' => 'projects', 'uses' => 'ProjectController@showProjects'));

Route::get("projects/{id}/edit", array('uses' => 'ProjectController@editProject'));

Route::post("projects/{id}/update", array(
    'as'    => 'project.update', 
    'uses'  => 'ProjectController@updateProject'
));

Route::get("projects/add", array('uses' => 'ProjectController@addProject'));

Route::post("projects/add", array(
    'as' => 'project.add', 
    'uses' => 'ProjectController@saveProject'
));

Route::get("projects/{id}/delete", array('uses' => 'ProjectController@deleteProject'));

// Clients
Route::get("clients", array(
    'as'    => 'clients',
    'uses'  => 'ClientController@showClients'
));

Route::get("clients/{id}/edit", array(
    'uses'  => 'ClientController@editClient'
));

Route::post("clients/{id}/update", array(
    'as'    =>  'client.update',
    'uses'  =>  'ClientController@updateClient'
));

Route::get("clients/add", array(
    'uses'  =>  'ClientController@addClient'
));

Route::post("clients/add", array(
    'as'    =>  'client.add',
    'uses'  =>  'ClientController@saveClient'
));

Route::get("clients/{id}/delete", array(
    'uses'  =>  'ClientController@deleteClient'
));

// Tasks
Route::get("tasks", array(
    'as'    => 'tasks',
    'uses'  => 'TaskController@showTasks'
));

Route::get("tasks/{id}/edit", array(
    'uses'  => 'TaskController@editTask'
));

Route::post("tasks/{id}/update", array(
    'as'    =>  'task.update',
    'uses'  =>  'TaskController@updateTask'
));

Route::get("tasks/add", array(
    'uses'  =>  'TaskController@addTask'
));

Route::post("tasks/add", array(
    'as'    =>  'task.add',
    'uses'  =>  'TaskController@saveTask'
));

Route::get("tasks/{id}/delete", array(
    'uses'  =>  'TaskController@deleteTask'
));

// Checkins
Route::post("checkin/{id}/start", array(
    'uses'  =>  'CheckinController@startCheckin'
));

Route::post("checkin/{id}/end", array(
    'uses'  =>  'CheckinController@endCheckin'
));