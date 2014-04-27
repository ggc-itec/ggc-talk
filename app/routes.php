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

Route::get('/', array(
  'as' => 'home',
  function() {
    return View::make('home');
  }

));

Route::resource('welcome', 'WelcomeController');

// ===============================================
// Flickr SECTION =================================
// ===============================================
Route::model('flickr_pic', 'Flickr_pic');
Route::get('/flickr', 'FlickrPicController@index');
Route::get('/flick_favs', 'FlickrPicController@showFavs');
Route::post('/flickr_add', 'FlickrPicController@handleAdd');
Route::post('/flickr_delete', 'FlickrPicController@handleDelete');
Route::get('/editPic/{flickr_pic}', 'FlickrPicController@editFavPic');
Route::post('/saveEdit', 'FlickrPicController@handleEdit');
Route::get('/deleteFavPic{flickr_pic}', 'FlickrPicController@deleteFavPic');
Route::post('/deletePic', 'FlickrPicController@handleDelete');

// ===============================================
// Location SECTION =================================
// ===============================================
Route::group(array('prefix' => '/location'), function() {
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
// Imgrr SECTION =================================
//
// ===============================================
// ===============================================
Route::group(array('prefix' => '/imgrr'), function() {
  Route::model('imgrr_pic', 'Imgrr_pic');
  Route::model('imgrr_comment', 'Imgrr_comment');
  Route::get('/', 'ImgrrController@imageGallery');
  Route::get('/upload', 'ImgrrController@upload');
  Route::get('/comments/{imgrr_pic}', 'ImgrrController@displayComments');
  Route::post('/handleupload', 'ImgrrController@handleUpload');
  Route::post('/addcomment', 'ImgrrController@addComment');
});

// ===============================================
// Techtalks SECTION =============================
// ===============================================
// ===============================================
Route::group(array('prefix' => '/techtalk'), function() {
  Route::model('imgrr_pic', 'Imgrr_pic');
  Route::model('imgrr_comment', 'Imgrr_comment');
  Route::get('/', 'ImgrrController@imageGallery');
  Route::get('/upload', 'ImgrrController@upload');
  Route::get('/comments/{imgrr_pic}', 'ImgrrController@displayComments');
  Route::post('/handleupload', 'ImgrrController@handleUpload');
  Route::post('/addcomment', 'ImgrrController@addComment');
});

// ===============================================
// Posts SECTION =================================
// Handles routing for Message Board Post Views
// ===============================================
// ===============================================
Route::group(array('prefix' => '/posts'), function() {

  Route::get('/', array(
    'as' => 'posts',
    'uses' => 'PostController@index'
  ));
  Route::get('/addPost', 'PostController@create');
  Route::post('/store', 'PostController@store');
});

/*
 * User route-model binding
 */
Route::model('user', 'User');

/*
 * Only non-logged in users can access these routes
 */
Route::group(array('before' => 'guest'), function() {
  Route::get('login', array(
    'as' => 'login',
    'uses' => 'UserController@showLogin'
  ));
  Route::post('login', 'UserController@login');
  Route::get('register', array(
    'as' => 'register',
    'uses' => 'UserController@showRegister'
  ));
  Route::post('register', 'UserController@register');
  Route::get('reminder', array(
    'as' => 'reminder',
    'uses' => 'RemindersController@getRemind'
  ));
  Route::post('reminder', 'RemindersController@postRemind');

  Route::get('password/reset/{token}', array(
    'as' => 'reset',
    'uses' => 'RemindersController@getReset'
  ));
  Route::post('password/reset', 'RemindersController@postReset');

  Route::get('user/confirm/{token}', array(
    'as' => 'confirm',
    'uses' => 'UserController@confirm'
  ));
});

/*
 * Only logged in users can access these routes
 */
Route::group(array('before' => 'auth'), function() {
  Route::get('logout', array(
    'as' => 'logout',
    'uses' => 'UserController@logout'
  ));
  
  Route::get('account', array(
    'as' => 'account',
    'uses' => 'UserController@showAccount'
  ));
  Route::post('account', 'UserController@saveAccount');
  
  Route::group(array('before' => 'admin'), function() {
    Route::group(array('prefix' => 'admin'), function() {
      Route::get('users', array(
        'as' => 'modUsers',
        'uses' => 'UserController@listUsers'
      ));
      Route::group(array('prefix' => 'user'), function() {
        Route::get('create', array(
          'as' => 'createUser',
          function() {
            return View::make('auth.admin.user.create');
          }

        ));

        Route::post('create', 'UserController@create');

        Route::get('edit/{user}', array(
          'as' => 'editUser',
          'uses' => 'UserController@edit'
        ));

        Route::post('edit/{user}', 'UserController@save');

        Route::get('delete/{user}', array(
          'as' => 'deleteUser',
          'uses' => 'UserController@showDelete'
        ));

        Route::post('delete/{user}', 'UserController@delete');
      });
    });
  });
  //The Petition routes
  Route::group(array('prefix' => '/petitions'), function() {
  	Route::get('/', 'PetitionController@showAllPetitions');
	Route::get('create', 'PetitionController@showCreatePetition');
	Route::post('handleCreate', 'PetitionController@handleCreatePetition');
  });
});

// ===============================================
// Housing SECTION =================================
// Handles routing for housing
// ===============================================
// ===============================================
Route::group(array('prefix' => '/housing'), function()
{
	Route::get('/', 'HousingController@showListings');
	Route::get('post', 'HousingController@postListing');
	Route::post('handlePost', 'HousingController@handleAddPost');
	Route::get('redirectLogin', 'HousingController@redirectToLogin');
	Route::get('redirectRegister', 'HousingController@redirectToRegister');
	Route::get('previewPost', 'HousingController@previewPost');
});
