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
Route::get('login', 'PagesController@token');
Route::get('logout', 'PagesController@logout');
Route::get('dashboard', 'PagesController@dashboard');
Route::get('file', 'HomeController@index');
Route::post('auth', 'PagesController@auth');
Route::get('request', 'PagesController@requesttoken');
Route::get('auth', 'PagesController@connect');
Route::get('create', 'PagesController@addfaculty');
Route::post('create', 'PagesController@postAdd');
Route::get('liststudent', 'PagesController@liststudent');
Route::post('liststudent', 'PagesController@postliststudent');
Route::get('createstudent', 'PagesController@addstudent');
Route::post('createstudent', 'PagesController@postaddstudent');
Route::get('createrequest', 'PagesController@createrequest');
Route::post('createrequest', 'PagesController@postcreaterequest');
Route::get('createclass', 'PagesController@createclass');
Route::post('createclass', 'PagesController@postcreateclass');
//Route::post('createrequest', 'PagesController@postcreaterequest');
Route::get('add{class_name}/{id_num}', 'PagesController@addclassstudent');
Route::post('addclass/all', 'PagesController@addclassstudents');