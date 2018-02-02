<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
*/

Auth::routes();

Route::get('/', 'userController@index')->name('index');

Route::get('wallet', 'userController@Wallets')->name('wallet');

Route::get('createWallet', 'userController@createWallet')->name('createWallet');

Route::get('editWallet', 'userController@editWallet')->name('editWallet');

Route::patch('wallet/{id}', 'userController@update');

Route::post('createWallet', 'userController@store');


Route::group(['middleware' => 'admin'], function()
{
   Route::get('admin', 'adminController@index')->name('admin');

   Route::get('admin/{user}', 'adminController@details')->name('details');

   Route::get('admin/delete/{user}', 'adminController@delete')->name('deleteUser');
});

