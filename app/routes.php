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
Route::post("logout", array('usees' => 'LoginController@doLogout'));

Route::get("about", function(){
    return View::make('about')->withTitle('About');
});