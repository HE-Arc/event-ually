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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', 'WelcomeController@index')->name('welcome');

Route::get('signup', 'SignupController@index')->name('signup');

Route::get('login', 'LoginController@index')->name('login');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('events/{id}','EventController@show');
