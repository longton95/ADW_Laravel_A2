<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
*/

Auth::routes();

Route::get('/', 'adminController@index');

Route::get('/admin/{user}', 'adminController@details');

Route::get('/wallet', 'userController@index');

Route::get('/createWallet', 'userController@createWallet');

Route::get('/editWallet', 'userController@editWallet');

Route::patch('/wallet/{id}', 'userController@update');



