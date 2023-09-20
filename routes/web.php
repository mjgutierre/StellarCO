<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//PRODUCTS
Route::get('/', 'App\Http\Controllers\HomeController@index')->name('home.index');
Route::get('/products', 'App\Http\Controllers\ProductController@index')->name('product.index');
Route::get('/products-ordered-ascending', 'App\Http\Controllers\ProductController@getProductsOrderedAsc')->name('product.ordered-asc');
Route::get('/products-ordered-descending', 'App\Http\Controllers\ProductController@getProductsOrderedDsc')->name('product.ordered-dsc');
Route::get('/products-ordered-ascending-by-name', 'App\Http\Controllers\ProductController@getProductsOrderedNameAsc')->name('product.ordered-name-asc');
Route::get('/products-ordered-descending-by-name', 'App\Http\Controllers\ProductController@getProductsOrderedNameDsc')->name('product.ordered-name-dsc');
Route::get('/products/{id}', 'App\Http\Controllers\ProductController@show')->name('product.show');

//REVIEWS
Route::post('/products/{id}/review', 'App\Http\Controllers\ReviewController@save')->name("review.save");

Route::middleware('admin')->group(function () {
    //ADMIN
    Route::get('/admin', 'App\Http\Controllers\Admin\AdminHomeController@index')->name('admin.index');

    //ADMIN-PRODUCTS
    Route::get('/admin/products/', 'App\Http\Controllers\Admin\AdminProductController@index')->name('admin.product.index');
    Route::get('/admin/products/products-ordered-ascending', 'App\Http\Controllers\Admin\AdminProductController@getProductsOrderedAsc')->name('admin.product.ordered-asc');
    Route::get('/admin/products/products-ordered-descending', 'App\Http\Controllers\Admin\AdminProductController@getProductsOrderedDsc')->name('admin.product.ordered-dsc');
    Route::get('/admin/products/products-ordered-ascending-by-name', 'App\Http\Controllers\Admin\AdminProductController@getProductsOrderedNameAsc')->name('admin.product.ordered-name-asc');
    Route::get('/admin/products/products-ordered-descending-by-name', 'App\Http\Controllers\Admin\AdminProductController@getProductsOrderedNameDsc')->name('admin.product.ordered-name-dsc');
    Route::post('/admin/products/save', 'App\Http\Controllers\Admin\AdminProductController@save')->name('admin.product.save');
    Route::get('/admin/products/create', 'App\Http\Controllers\Admin\AdminProductController@create')->name('admin.product.create');
    Route::get('/admin/products/{id}', 'App\Http\Controllers\Admin\AdminProductController@show')->name('admin.product.show');
    Route::delete('/admin/products/{id}', 'App\Http\Controllers\Admin\AdminProductController@destroy')->name('admin.product.destroy');
    Route::put('/admin/products/{id}', 'App\Http\Controllers\Admin\AdminProductController@update')->name('admin.product.update');

    //ADMIN-STATISTICS
    Route::get('/admin/statistics', 'App\Http\Controllers\Admin\AdminStatisticsController@index')->name('admin.statistics.index');
    Route::get('/admin/statistics/user-list', 'App\Http\Controllers\Admin\AdminStatisticsController@users')->name('admin.statistics.users');
});

Auth::routes();
