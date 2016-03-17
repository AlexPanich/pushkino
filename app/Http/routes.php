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

Route::group(['middleware' => ['web']], function () {
    Route::get('/', 'PagesController@index');
    Route::get('news', 'PagesController@news');
    Route::get('classifieds', 'PagesController@classifieds');
    Route::resource('classifieds/messages', 'MessagesController');
    Route::resource('news/articles', 'ArticlesController');
    Route::post('classifieds/messages/{messages}/photos',
            ['as' => 'store_photo_path', 'uses' =>'MessagesController@addPhoto']);
    Route::delete('photo/{messages}', 'MessagesController@destroyPhoto');
    Route::auth();
    Route::get('admin', 'AdminController@index');
});


