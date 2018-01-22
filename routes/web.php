<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
*/

Route::get('/', 'adminController@index');

Route::get('/admin/{user}', 'adminController@details');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

