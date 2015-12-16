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

Route::get('/', 'PagesController@index');
Route::post('/', 'PagesController@login');
Route::get('home', 'PagesController@home');
//Route::post('home', 'PagesController@logout');
Route::get('login', 'PagesController@login2');
Route::get('logout', 'PagesController@logout');
Route::get('dashboard', 'PagesController@dashboard');
Route::get('file', 'HomeController@index');
Route::post('auth', 'PagesController@auth');
Route::get('auth', 'PagesController@auth');
Route::get('create', 'PagesController@add');