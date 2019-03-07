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
    Route::post('categories/store','CategoriesController@store');
    Route::post('categories/update/{id}','CategoriesController@update');
    Route::get('category/delete/{id}','CategoriesController@delete');
    Route::get('categories/index','CategoriesController@index');

    /*
     * sub categories routes
     */
    Route::post('sub/categories/store/{id}','SubCategoriesController@store');
    Route::post('sub/category/update/{id}','SubCategoriesController@update');
    Route::get('sub/category/delete/{id}','SubCategoriesController@delete');
    Route::get('sub/categories/index','SubCategoriesController@index');

    /*
     * Conditions routes
     */
    Route::post('condition/store','ConditionsController@store');
    Route::post('condition/update/{id}','ConditionsController@update');
    Route::get('condition/delete/{id}','ConditionsController@delete');
    Route::get('condition/index','ConditionsController@index');

    /*
     * Currency routes
     */
    Route::post('currency/store','CurrencyController@store');
    Route::post('currency/update/{id}','CurrencyController@update');
    Route::get('currency/delete/{id}','CurrencyController@delete');
    Route::get('currency/index','CurrencyController@index');

    /*
     * Brand routes
     */

    Route::post('brand/store','BrandController@store');
    Route::post('brand/update/{id}','BrandController@update');
    Route::get('brand/delete/{id}','BrandController@delete');
    Route::get('brand/index','BrandController@index');


    Route::middleware(['admin.auth'])->group(function(){


        Route::get('home', 'HomeController@index');
    });
});
