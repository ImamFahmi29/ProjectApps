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

 Route::resource('/articles','articlesController');
 
 //Route::get('articles','articlesController@show')->name('articles.index');
 Route::resource('comments', 'CommentsController');
 // Route::post('comments/changeStatus', array('as' => 'changeStatus', 'uses' => 'CommentsController@changeStatus'));
  // route::get('test','articlesController@index')->name('artikel');

Route::get('profile','StaticsController@profile')->name('profile');
Route::get('home','StaticsController@home')->name('home');

//signup Session
Route::get('signup', 'UsersController@signup')->name('signup');
Route::post('signup', 'UsersController@signup_store')->name('signup.store');
//Login Session
Route::get('login', 'SessionsController@login')->name('login');
Route::post('login', 'SessionsController@login_store')->name('login.store');
Route::get('logout', 'SessionsController@logout')->name('logout');

//this routes for check if email user is exist in database
Route::get('forgot-password', 'ReminderController@create')->name('reminders.create');
Route::post('forgot-password', 'ReminderController@store')->name('reminders.store');
//this routes for handle changes password
Route::get('reset-password/{id}/{token}', 'ReminderController@edit')->name('reminders.edit');
Route::post('reset-password/{id}/{token}','ReminderController@update')->name('reminders.update');