<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Route::get('/', 'WelcomeController@index');

Route::get('/', 'PollController@index');
Route::get('api/poll/{id?}', 'PollController@getPoll');
Route::post('api/poll', 'PollController@postPoll');
Route::put('api/poll/{id}', 'PollController@putPoll');
Route::delete('api/poll/{id}', 'PollController@deletePoll');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
