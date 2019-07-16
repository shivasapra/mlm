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

Route::get('/', 'HomeController@index')->name('home');
Route::get('/account-settings/{user}', 'UserController@accountSettings')->name('account.settings');
Route::post('/update-profile/{user}', 'UserController@updateProfile')->name('update.profile');