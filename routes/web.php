<?php

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

//ADMIN
Route::get('/admin', 'App\Http\Controllers\Admin\AdminHomeController@index')->name("admin.index");

//ADMIN-PRODUCTS
Route::get('/admin/products', 'App\Http\Controllers\Admin\AdminProductController@index')->name("admin.product.index");
Route::post('/admin/products/save', 'App\Http\Controllers\Admin\AdminProductController@save')->name("admin.product.save");
Route::get('/admin/products/create', 'App\Http\Controllers\Admin\AdminProductController@create')->name("admin.product.create");
Route::get('/admin/products/{id}', 'App\Http\Controllers\Admin\AdminProductController@show')->name("admin.product.show");
Route::delete('/admin/products/{id}', 'App\Http\Controllers\Admin\AdminProductController@destroy')->name("admin.product.destroy");
Route::put('/admin/products/{id}', 'App\Http\Controllers\Admin\AdminProductController@update')->name("admin.product.update");

//PRODUCTS
Route::get('/products', 'App\Http\Controllers\ProductController@index')->name("product.index");
Route::get('/products/{id}', 'App\Http\Controllers\ProductController@show')->name("product.show");
