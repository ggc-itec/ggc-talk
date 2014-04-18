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

//Routes for the map feature
//Example from Dayle Ree's, Code Bright http://daylerees.com/codebright
Route::model('location', 'Location');
Route::get('/showlist', 'LocationController@showList');
Route::get('/create', 'LocationController@create');
Route::get('/edit/{location}', 'LocationController@edit');
Route::get('/delete/{location}', 'LocationController@delete');
Route::get('/showmap/{location}', 'LocationController@showMap');
Route::post('/create', 'LocationController@handleCreate');
Route::post('/edit', 'LocationController@handleEdit');
Route::post('/delete', 'LocationController@handleDelete');


Route::model('flickr_pic','Flickr_pic');
Route::get('/flickr', 'FlickrPicController@index');
Route::get('/flick_favs', 'FlickrPicController@showFavs');
Route::post('/flickr_add','FlickrPicController@handleAdd');
//Route::post('/flickr_delete', 'FlickrPicController@handleDelete');
Route::get('/flickr/delete/{flickr_pic}', 'FlickrPicController@delete');
Route::post('flickr/delete', 'FlickrPicController@handleDelete');


Route::model('book_table', 'Book_table');
Route::get('/marketplace', 'MarketPlaceController@index');
Route::post('/marketplace_add', 'MarketPlaceController@handle_add');

