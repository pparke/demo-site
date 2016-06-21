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

// Authentication Routes
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration Routes
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

// Home Route
Route::get('/home', 'HomeController@index');

// Blog Routes
Route::post('/blogs', 'BlogController@store')->middleware('auth');
Route::get('/blogs', 'BlogController@index')->name('blogs');
Route::get('/blogs/create', 'BlogController@create');
Route::get('/blogs/{slug}', 'BlogController@show');
Route::post('/blogs/{slug}', 'BlogController@update')->middleware('auth');
Route::delete('/blogs/{id}', 'BlogController@destroy')->middleware('auth');

// Link Routes
Route::post('/links', 'LinkController@store')->middleware('auth');
Route::get('/links', 'LinkController@index')->name('links');
Route::get('/links/create', 'LinkController@create');
Route::post('/links/{id}', 'LinkController@update')->middleware('auth');
Route::delete('/links/{blog}', 'LinkController@destroy')->middleware('auth');
