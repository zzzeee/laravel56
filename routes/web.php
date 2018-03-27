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
    return view('mobile');
});

Route::get('/mobile/{a?}', function () {
    return view('mobile');
});

Route::get('/mobile/{a?}/{b?}', function () {
    return view('mobile');
});


Route::resource('posts', 'PostController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
