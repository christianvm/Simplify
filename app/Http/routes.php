<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/example', function () {
    return view('example');
});

Route::get('auth/facebook', 'Auth\AuthController@redirectToProvider');
Route::get('auth/facebook/callback', 'Auth\AuthController@handleProviderCallback');

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::get('/home', 'HomeController@index');
    Route::get('/admin', 'AdminController@index');

    Route::get('/search', [
		'uses' => 'SearchController@getResults',
		'as' => 'search.results',
	]);

    # Profile
	Route::get('/user/{username}', [
		'uses' => 'ProfileController@getProfile',
		'as' => 'profile.index',
	]);

	Route::get('/profile/edit', [
		'uses' => 'ProfileController@getEdit',
		'as' => 'profile.edit',
		'midleware' => ['auth'],
	]);

	Route::post('/profile/edit', [
		'uses' => 'ProfileController@postEdit',
		'midleware' => ['auth'],
	]);
});

