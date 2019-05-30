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

Route::get('/', 'HomeController@index');

Auth::routes();

Route::get('home', 'HomeController@index');

//Product's route
Route::get('c/{name}/{id}/{subcategory_name?}/{subcategory_id?}', 'ProductsController@index');
Route::get('itm/view/{id}/{name?}', 'ProductsController@show');
Route::get('index/products','ProductsController@index');
Route::get('search', 'ProductsController@search');
Route::get('filter', 'ProductsController@filter');


//Review's Route
Route::post('review/{id}','ReviewController@store');


//WishList's Route
Route::resource('wishlist','WishListController');
Route::post('add/wishLlist/{id}','WishListController@add');
Route::get('/delete/wish list/{id}','WishListController@destroy');


//Cart's Route
Route::get('add/','CartController@index');
Route::post('add/cart','CartController@store');
Route::get('remove/cart/{id}','CartController@destroy');

// User Profile Route

Route::resource('profile', 'ProfileController');
Route::patch('profile/update/details', 'ProfileController@update');
Route::patch('profile/update/password', 'ProfileController@updatePassword');
Route::patch('profile/update/picture', 'ProfileController@updateProfile');


//Chat Routes

Route::get('/index/chat/','ChatsController@index');
Route::post('/chat/send','ChatsController@send');
Route::get('/chat/fetch/messages','ChatsController@fetchMessages');
Route::get('/conversation/fetch','ChatsController@fetchConversations');
