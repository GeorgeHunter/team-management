<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/dashboard', 'HomeController@dashboard')->middleware('auth');;
Route::get('/', 'HomeController@index');

Auth::routes();

Route::get('/pairings', 'PairingsController@index');

// Matches
Route::get('/matches', 'MatchesController@index');
Route::get('/matches/create', 'MatchesController@create');
Route::get('/matches/{match}', 'MatchesController@show');
Route::get('/matches/edit/{match}', 'MatchesController@edit');
Route::get('matches/send/{match}', 'MatchesController@buildMail');

Route::post('/matches/edit/{match}', 'MatchesController@update');
Route::post('/matches', 'MatchesController@store');
Route::post('/matches/send/{match}', 'MessagesController@sendMail');
//Availabilty
Route::get('matches/{match_id}/available/{player_id}', 'MatchesController@available');
Route::get('matches/{match_id}/unavailable/{player_id}', 'MatchesController@unavailable');


// Opponents
Route::get('/opponents', 'OpponentsController@index');
Route::get('/opponents/create', 'OpponentsController@create');

Route::post('/opponents', 'OpponentsController@store');


// Venues
Route::get('/venues', 'VenuesController@index');
Route::get('/venues/create', 'VenuesController@create');

Route::post('/venues', 'VenuesController@store');

// Player
Route::get('/players', 'PlayerController@index');
Route::get('/players/create', 'PlayerController@create');
Route::get('/players/{player}', 'PlayerController@show');
//Route::post('/players', 'PlayerController@store');

// Message Handling
Route::get('/messages', 'MessagesController@index');
Route::post('/receive-mail', 'MessagesController@receiveMail');
Route::post('/messages/{message}/mark-as-read', 'MessagesController@markAsRead');
Route::post('/messages/{message}/mark-as-unread', 'MessagesController@markAsUnread');
