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

Route::get('/','NavigationController@homepage');

Auth::routes();

Route::get('/my-account', 'HomeController@index')->name('home');

//My Account Routes
Route::get('/add-product','ProductController@create');
Route::get('/change-account-information','NavigationController@changeAccountInformation');

//Products
Route::post('/add-product','ProductController@store');
Route::get('/product/{id}','ProductController@view');
Route::post('/product/update-time','ProductController@updateTime');