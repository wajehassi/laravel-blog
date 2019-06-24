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

Auth::routes();

Route::group(array('middleware' => ['auth']), function () {
    Route::get('', 'HomeController@index');
    Route::get('/dashboard', 'HomeController@index')->name('dashboard');


    Route::resource('category', 'CategoryController');

    Route::resource('post', 'PostController');


});
