<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');


Route::get('/test', function(){

	return view('ecom');
});

Route::get('/admin', function(){

	return view('admin.index');
});
Route::get('/admin/charts', function(){

	return view('admin.charts');
});



