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

Route::get('/', function()
{
	return View::make('home');
});

Route::resource('welcome','WelcomeController');




// ===============================================
// Location SECTION =================================
// ===============================================
Route::group(array('prefix' => '/location'), function()
{
	//Routes for the map feature
	//Example from Dayle Ree's, Code Bright http://daylerees.com/codebright
	Route::model('location', 'Location');
	
	Route::get('/', 'LocationController@showList');
	Route::get('/showlist', 'LocationController@showList');
	Route::get('/create', 'LocationController@create');
	Route::get('/edit/{location}', 'LocationController@edit');
	Route::get('/delete/{location}', 'LocationController@delete');
	Route::get('/showmap/{location}', 'LocationController@showMap');
	
	Route::post('/create', 'LocationController@handleCreate');
	Route::post('/edit', 'LocationController@handleEdit');
	Route::post('/delete', 'LocationController@handleDelete');

});

// ===============================================
// Posts SECTION =================================
// Handles routing for Message Board Post Views
// ===============================================
// ===============================================
Route::group(array('prefix' => '/posts'), function()
{
	Route::get('/', 'PostsController@index');
});