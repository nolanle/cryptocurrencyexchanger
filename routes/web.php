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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


/*
|--------------------------------------------------------------------------
| Social Login
|--------------------------------------------------------------------------
|
| Here is the where for internal network login like Facebook, Google
|
*/
Route::get('/login/{provider}', 'Auth\LoginController@socialLogin');
Route::get('/login/callback/{provider}', 'Auth\LoginController@loginCallback');
