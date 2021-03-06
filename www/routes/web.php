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

Route::get('/', 'HomeController@index')->name('home');

Route::get('/post/{category}/{id}', 'HomeController@page')->name('page');

Auth::routes();

Route::prefix('admin')->namespace('Admin')->middleware(['auth'])->group(function () {
  Route::resource('posts', 'PostController');
  Route::resource('category', 'CategoryController');
  Route::resource('tag', 'TagController');
  Route::post('fileupload','FileuploadController@upload');
});
  



