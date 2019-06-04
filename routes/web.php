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
//Auth\RegisterController@ShowRegistrationForm
Route::get('register/{usermail}', function ($usermail = null) {
    return view('auth.register', ['usermail' => $usermail]);
});
Route::get('/verify-user/{code}', 'Auth\RegisterController@activateUser')->name('activate.user');