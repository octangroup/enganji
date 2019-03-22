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

Route::get('/', 'ProductsController@index');

Auth::routes();

Route::get('home', 'HomeController@index');

//Product's route
Route::get('product/index','ProductsController@index');
Route::get('product/view/{id}','ProductsController@show');
Route::get('search', 'ProductsController@search');
Route::get('filter', 'ProductsController@filter');


//Review's Route
Route::post('review/{id}','ReviewController@store');


//WishList's Route
Route::post('/add/wish list/{id}','ProductsController@addToWishList');
Route::get('/delete/wish list/{id}','ProductsController@deleteWishList');
Route::get('/view/wish list','ProductsController@viewWishList');


//Cart's Route
Route::get('add/','CartController@index');
Route::post('add/cart','CartController@store');
Route::get('remove/cart/{id}','CartController@destroy');
