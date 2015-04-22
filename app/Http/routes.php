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

Route::get('/', 'PollController@index');

// Routes for Polls
Route::get('api/polls/{id?}', 'PollController@getPoll');
Route::post('api/polls', 'PollController@postPoll');
Route::put('api/polls/{id}', 'PollController@putPoll');
Route::delete('api/polls/{id}', 'PollController@deletePoll');

// Routes for Poll Options
Route::get('api/polls/{pollId}/options/{optionId?}', 'PollOptionController@getPollOption');
Route::post('api/polls/{pollId}/options', 'PollOptionController@postPollOption');
Route::put('api/polls/{pollId}/options/{optionId}', 'PollOptionController@putPollOption');
Route::delete('api/polls/{pollId}/options/{optionId}', 'PollOptionController@deletePollOption');