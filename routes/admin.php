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



Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {
    Route::get('/', 'Auth\LoginController@showLoginForm');
    Route::post('login', 'Auth\LoginController@login')->name('admin.login');
    Route::post('logout', 'Auth\LoginController@logout')->name('admin.logout');
    Route::get('register', 'Auth\RegisterController@showRegistrationForm');
    Route::post('register', 'Auth\RegisterController@register')->name('admin.register');

    /*
     * Categories routes
     */
    Route::resource('categories', 'CategoriesController');
    Route::post('categories/update/{id}','CategoriesController@update');
    Route::get('category/delete/{id}','CategoriesController@destroy');

    /*
     * sub categories routes
     */
    Route::post('sub/categories/store/{id}','SubCategoriesController@store');
    Route::post('sub/category/update/{id}','SubCategoriesController@update');
    Route::get('sub/category/delete/{id}','SubCategoriesController@destroy');


    /*
     * Conditions routes
     */
    Route::resource('conditions', 'ConditionsController');
    Route::get('condition/delete/{id}','ConditionsController@destroy');


    /*
     * Currency routes
     */
    Route::resource('currency', 'CurrencyController');
    Route::get('currency/delete/{id}','CurrencyController@delete');

    /*
     * Brand routes
     */

    Route::resource('brand','BrandController');
    Route::get('brand/delete/{id}','BrandController@delete');


    /*
     * Affiliates' routes
     */
    Route::get('affiliates/index','AffiliatesController@index');
    Route::post('affiliate/change/status/{id}','AffiliatesController@changeStatus');

    /*
     * Products in admin side's route
     */
    Route::get('products/index','ProductsController@index');
    Route::post('product/change/status/{id}','ProductsController@changeStatus');
    Route::middleware(['admin.auth'])->group(function(){


        Route::get('home', 'HomeController@index');
    });
});
