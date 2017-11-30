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
})->name('root');
// Route::resource('users','StaticsController');
Route::get('details','StaticsController@detail')->name('details');
Route::get('user_detail','StaticsController@index')->name('users.index');
// Route::get('register','StaticsController@signup')->name('register2');

Route::get('register','UsersController@signup')->name('register');
Route::post('register','UsersController@signup_store')->name('register.user');

Route::get('user-form','UserDetailController@detail')->name('user.detail');
Route::post('user-detail','UserDetailController@user_detail')->name('user.store');
Route::get('user-index','UserDetailController@index')->name('user.index');

// Route::get('register','UsersController@signup_store')->name('register.user');
// Route::post('register','UsersController@signup_store')->name('register.user');

Route::get('login', 'SessionsController@login')->name('login');
Route::post('login', 'SessionsController@login_store')->name('login.store');
Route::get('logout', 'SessionsController@logout')->name('logout');

// Route::resource('details','UserDetailController');

Route::group(['prefix'=>'admin'], function(){
	Route::resource('manages', 'AdminsController');
	Route::get('manages-list','AdminsController@list')->name('manages.list');
	Route::get('manages-admin','AdminsController@user')->name('manages.admin');
	Route::get('change/{user_id}','AdminsController@change')->name('change');
	Route::get('reject/{user_id}','AdminsController@reject')->name('reject');
	// Route::get('edit','AdminsController@edit')->name('manages.edit');
	// Route::post('update/{user_id}','AdminsController@update')->name('manages.update');
	// Route::get('delete/{user_id}','AdminsController@destroy')->name('delete');

});
