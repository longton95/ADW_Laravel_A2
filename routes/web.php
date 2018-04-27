<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
*/

Auth::routes();

// Main routes
Route::get('/', 'userController@index')->name('index');
Route::get('home/{id}', 'userController@home')->name('home');
Route::get('wallet', 'userController@Wallets')->name('wallet');
Route::get('createWallet', 'userController@createWallet')->name('createWallet');
Route::get('editWallet', 'userController@editWallet')->name('editWallet');
Route::get('deleteWallet', 'userController@deleteWallet')->name('deleteWallet');

// These routes just relate to functions not views
Route::patch('wallet/{id}', 'userController@update');
Route::get('wallet/delete/{id}', 'userController@delete');
Route::post('createWallet', 'userController@store');

// Social login route and callback
Route::get('login/{provider}', 'Auth\LoginController@redirectToProvider');
Route::get('login/{provider}/callback', 'Auth\LoginController@handleProviderCallback');

// These routes below are admin routes and require your role to be and an admin
Route::group(['middleware' => 'admin'], function()
{
   Route::get('admin', 'adminController@index')->name('admin');
   Route::get('admin/{user}', 'adminController@details')->name('details');
   Route::get('admin/delete/{user}', 'adminController@delete')->name('deleteUser');
});

