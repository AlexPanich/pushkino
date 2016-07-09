<?php

Route::get('/', 'PagesController@index');
Route::get('news', 'PagesController@news');
Route::get('classifieds', 'PagesController@classifieds');
Route::resource('classifieds/messages', 'MessagesController');
Route::resource('news/articles', 'ArticlesController');
Route::post('classifieds/messages/{messages}/photos',
        ['as' => 'store_photo_path', 'uses' =>'MessagesController@addPhoto']);
Route::delete('photo/{photoId}', 'MessagesController@destroyPhoto');
Route::auth();
Route::get('admin', 'AdminController@index');
