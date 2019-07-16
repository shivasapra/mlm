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
Route::post('/update-password/{user}', 'UserController@updatePassword')->name('update.password');
Route::post('/update-email/{user}', 'UserController@updateEmail')->name('update.email');
Route::post('/update-mobile/{user}', 'UserController@updateMobile')->name('update.mobile');
Route::post('/update-pin/{user}', 'UserController@updatePin')->name('update.pin');

Route::get('/assignment-settings/{user}', 'AssignmentController@index')->name('assignment.settings');
Route::post('/update-BankTransfer/{user}', 'AssignmentController@updateBankTransfer')->name('update.bankTransfer');
Route::post('/update-Paypal/{user}', 'AssignmentController@updatePaypal')->name('update.paypal');
Route::post('/update-PerfectMoney/{user}', 'AssignmentController@updatePerfectMoney')->name('update.perfectMoney');