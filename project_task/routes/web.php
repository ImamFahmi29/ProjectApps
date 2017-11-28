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

Route::get('/', function () {
    return view('welcome');
});

Route::get('profile','StaticsController@profile')->name('profile');
Route::get('home','StaticsController@home')->name('home');
Route::get('show/{id}','StaticsController@show')->name('show');

Route::get('register','UsersController@signup')->name('register');
Route::post('register','UsersController@signup_store')->name('register.user');
Route::get('user-detail','UsersController@detail')->name('user.detail');
Route::post('user-detail','UsersController@user_detail')->name('user.store');

Route::get('login', 'SessionsController@login')->name('login');
Route::post('login', 'SessionsController@login_store')->name('login.store');
Route::get('logout', 'SessionsController@logout')->name('logout');
