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

Route::get('/', 'FrontendController@getHome');
Route::get('detail/{id}/{slug}.html', 'FrontendController@getDetail');
Route::post('detail/{id}/{slug}.html', 'FrontendController@postComment');
Route::get('category/{id}/{slug}.html', 'FrontendController@getCategory');
Route::get('search', 'FrontendController@getSearch')->name('search');
Route::get('search/name', 'FrontendController@getSearchAjax');
Route::get('device', 'FrontendController@getDevice');
Route::group(['prefix' => 'cart'], function() {
    Route::get('add/{id}', 'CartController@getAddCart');
    Route::get('show', 'CartController@getShowCart');
    Route::get('delete/{id}', 'CartController@getDeleteCart');
    Route::get('update', 'CartController@getUpdateCart');
    Route::post('show', 'CartController@postComplete')->name('cart');
    Route::post('/autocomplete/discount', 'CartController@fetchDiscount')->name('autocomplete.discount');
});
Route::group(['prefix' => 'user'], function() {
    route::get('/', 'UserController@getLogin')->name('customer');
    route::post('/', 'UserController@postLogin');
    Route::get('register', 'UserController@getRegister')->name('register');
    Route::post('register', 'UserController@postRegister');
    Route::get('logout', 'UserController@getLogout');
    Route::get('order', 'UserController@getOrder');
    Route::get('single/{id}', 'UserController@getSingle');
});
Route::get('complete', 'CartController@getComplete');
Route::group(['namespace' => 'Admin'], function () {
    Route::group(['prefix' => 'login', 'middleware' => 'CheckLogedIn'], function () {
        Route::get('/', 'LoginController@getLogin')->name('login');
        Route::post('/', 'LoginController@postLogin');
    });
    Route::get('logout', 'HomeController@getLogout');
    Route::group(['prefix' => 'admin', 'middleware' => 'CheckLogedOut'], function() {
        Route::get('home', 'HomeController@getHome');
        Route::group(['prefix' => 'category'], function () {
            Route::get('/', 'CategoryController@getAllCategories')->name('category');
            Route::post('/', 'CategoryController@postAllCategories');
            Route::get('edit/{id}', 'CategoryController@getEditCategories')->name('editcategory');
            Route::post('edit/{id}', 'CategoryController@postEditCategories');
            Route::get('delete/{id}', 'CategoryController@getDeleteCategories');
        });
        Route::group(['prefix' => 'product'], function() {
            Route::get('/', 'ProductController@getProduct');
            Route::get('add', 'ProductController@getAddProduct')->name('addproduct');
            Route::post('add', 'ProductController@postAddProduct');
            Route::get('edit/{id}', 'ProductController@getEditProduct')->name('editproduct');
            Route::post('edit/{id}', 'ProductController@postEditProduct');
            Route::get('delete/{id}', 'ProductController@getDeleteProduct');
        });
        Route::group(['prefix' => 'order'], function() {
            Route::get('/', 'OrderController@getOrder');
            Route::get('detail/{id}', 'OrderController@getDetailOrder');
            Route::get('status/{id}', 'OrderController@getStatusOrder');
            Route::get('delete/{id}', 'OrderController@getDeleteOrder');
        });
        Route::group(['prefix' => 'super'], function() {
            Route::get('/', 'SuperAdminController@getSuperAdmin');
            Route::post('add', 'SuperAdminController@postAddAdmin')->name('addAdmin');
            Route::get('edit/{id}', 'SuperAdminController@getEditAdmin');
            Route::post('edit/{id}', 'SuperAdminController@postEditAdmin');
            Route::get('delete/{id}', 'SuperAdminController@getDeleteAdmin');
        });
    });
});
