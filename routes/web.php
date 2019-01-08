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
// Login Routes
Route::get('/', '\App\Modules\Auth\Controllers\LoginController@getLogin');
Route::post('/','\App\Modules\Auth\Controllers\LoginController@postLogin');

// Register Routes
Route::get('register', '\App\Modules\Auth\Controllers\RegisterController@getRegister');
Route::post('register', '\App\Modules\Auth\Controllers\RegisterController@postRegister');
Route::get('/user/verify/{user_token}/{user_id}', '\App\Modules\Auth\Controllers\RegisterController@verifyUser');

// Forgot Password Routes
Route::get('forgot', '\App\Modules\Auth\Controllers\ForgotPasswordController@getForgotPassword');

// User Dashboardb                                               
Route::group(['module' => 'Dashboard', 'middleware' => ['auth'], 'namespace' => 'App\Modules\Dashboard\Controllers'], function () {
	Route::get('/dashboard', '\App\Modules\Dashboard\Controllers\DashboardController@viewDashboard');
});

