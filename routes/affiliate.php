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



Route::group(['prefix' => 'affiliate', 'namespace' => 'Affiliate'], function () {
    Route::get('/', 'Auth\LoginController@showLoginForm');
    Route::post('login', 'Auth\LoginController@login')->name('affiliate.login');
    Route::post('logout', 'Auth\LoginController@logout')->name('affiliate.logout');
    Route::get('register', 'Auth\RegisterController@showRegistrationForm');
    Route::post('register', 'Auth\RegisterController@register')->name('affiliate.register');

    /*
     * Products' routes
     */

    Route::resource('product', 'ProductsController');
    Route::get('product/delete/{id}','ProductsController@destroy');


    /*
     * Deals' Routes
     */

    Route::get('deals','DealsController@index');
    Route::post('deals/save','DealsController@store');


    Route::middleware(['affiliate.auth'])->group(function(){


        Route::get('home', 'HomeController@index');

    });
});
