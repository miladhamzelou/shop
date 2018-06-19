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

Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function () {

    Route::get('/', 'HomeController@index')->name('admin.home');

    Route::group(['prefix' => 'user'], function () {
        Route::get('/', 'UserController@index')->name('admin.user.index');
        Route::any('update/{user}', 'UserController@update')->name('admin.user.update');
        Route::get('delete/{user}', 'UserController@delete')->name('admin.user.delete');
        Route::get('suspend/{user}', 'UserController@suspend')->name('admin.user.suspend');
    });

    Route::group(['prefix' => 'category'], function () {
        Route::get('/', 'CategoryController@index')->name('admin.category.index');
        Route::any('create', 'CategoryController@create')->name('admin.category.create');
        Route::any('update/{category}', 'CategoryController@update')->name('admin.category.update');
        Route::get('delete/{category}', 'CategoryController@delete')->name('admin.category.delete');
        Route::get('approved/{category}', 'CategoryController@approved')->name('admin.category.approved');
    });

    Route::group(['prefix' => 'shop'], function () {
        Route::get('/', 'ShopController@index')->name('admin.shop.index');
        Route::any('create', 'ShopController@create')->name('admin.shop.create');
        Route::any('update/{shop}', 'ShopController@update')->name('admin.shop.update');
        Route::get('delete/{shop}', 'ShopController@delete')->name('admin.shop.delete');
        Route::get('approved/{shop}', 'ShopController@approved')->name('admin.shop.approved');
        Route::get('hidden/{shop}', 'ShopController@hidden')->name('admin.shop.hidden');
    });

    Route::get('logout', 'HomeController@logout')->name('admin.logout');

});

Route::group(['prefix' => 'auth'], function () {
    Route::any('send', 'AuthController@send');
    Route::any('check', 'AuthController@check');
});

Route::get('/', 'HomeController@index')->name('home');
