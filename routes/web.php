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

//Route::get('/', function () {
//    return view('welcome');
//});

Auth::routes();

Route::get('/', 'ProductsController@index');
Route::resource('customer', 'CustomersController');
Route::resource('product','ProductsController');
Route::get('admin/dashboard', 'UserController@dashboard');
//Route::get('/users/{user}', 'UserController@show');
//        
//Route::get('/home', 'HomeController@index')->name('home');
//Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');
//Route::get('admin/dashboard', 'AdminController@index');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
