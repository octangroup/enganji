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


    // Ads Controller

    Route::resource('ads','AdsController');
    Route::get('ads/delete/{id}','AdsController@destroy');
    Route::get('search/ads','AdsController@search');

    /*
     * Categories routes
     */
    Route::resource('categories', 'CategoriesController');
    Route::post('categories/update/{id}','CategoriesController@update');
    Route::get('category/delete/{id}','CategoriesController@destroy');
    Route::get('category/search','CategoriesController@search');

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
    Route::get('currency/delete/{id}','CurrencyController@destroy');

    /*
     * Brand routes
     */

    Route::resource('brand','BrandController');
    Route::get('brand/delete/{id}','BrandController@destroy');
    Route::get('search/brands','BrandController@search');


    /*
     * Affiliates' routes
     */
    Route::get('affiliates/index','AffiliatesController@index');
    Route::get('affiliate/change/status/{id}','AffiliatesController@changeStatus');
    Route::get('affiliates/search', 'AffiliatesController@search');

    /*
     * Products in admin side's route
     */
    Route::get('products/index','ProductsController@index');
    Route::get('product/activation/{id}', 'ProductsController@changeStatus');
    Route::get('product/search','ProductsController@search');
    Route::get('product/filter', 'ProductsController@filter');
    Route::middleware(['admin.auth'])->group(function(){


        /*
         * Roles' routes
         */

     Route::post('role/store','RolesController@store');
     Route::get('roles/index','RolesController@index');
     Route::post('role/update/{id}','RolesController@update');
     Route::get('role/delete/{id}','RolesController@delete');

     /*
      * Admin management's routes
      */
        Route::get('admins/index','AdminsController@index');
        Route::post('admin/change_status/{id}','AdminsController@changeStatus');
        Route::get('admins/delete/role/{admin_id}/{role_id}','AdminsController@deleteRole');
        Route::post('admins/add/role/{admin_id}','AdminsController@addRole');
        Route::get('affiliate/search','AdminsController@search');



        Route::get('home', 'HomeController@index');

    });
});
