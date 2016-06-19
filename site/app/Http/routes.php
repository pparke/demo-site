<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('home');
});

Route::auth();

Route::get('/home', 'HomeController@index');

Route::post('/blog', 'BlogController@store')->middleware('auth');
Route::get('/blog', 'BlogController@index');
Route::get('/blog/create', function () {
  return view('blog.create');
});
Route::get('/blog/{slug}', 'BlogController@show');
Route::delete('/blog/{blog}', 'BlogController@destroy')->middleware('auth');
