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

// Route::get('/admin', function(){

// 	return view('admin.index');
// });
// Route::get('/admin/charts', function(){

// 	return view('admin.charts');
// });

Route::group(['middleware'=>'admin'],function(){

		Route::get('/admin',['as'=>'admin_dashboard','uses'=>'AdminHomeController@index']);

		Route::resource('/admin/orders','AdminOrdersController');

		Route::resource('/admin/products','AdminProductsController');

		Route::get('admin/products/draft','AdminProductsController@draft');

		Route::resource('/admin/reports','AdminReportsController');

		Route::resource('/admin/media','AdminMediaController');

		Route::resource('admin/categories','AdminCategoriesController');

		Route::resource('admin/users','AdminUsersController');



});





