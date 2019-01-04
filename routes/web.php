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

Route::get('/', '\App\Modules\Auth\Controllers\LoginController@getLogin');
Route::get('register', '\App\Modules\Auth\Controllers\RegisterController@getRegister');
Route::get('forgot', '\App\Modules\Auth\Controllers\ForgotPasswordController@getForgotPassword');

