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
//LANG
Route::get('/language/{locale}','App\Http\Controllers\LangController@change')->name('language.change');

//PRODUCTS
Route::get('/', 'App\Http\Controllers\HomeController@index')->name('home.index');
Route::get('/products', 'App\Http\Controllers\ProductController@index')->name('product.index');
Route::get('/products/ordered/{order}', 'App\Http\Controllers\ProductController@index')->name('product.ordered');
Route::get('/products/{id}', 'App\Http\Controllers\ProductController@show')->name('product.show');

//REVIEWS
Route::post('/products/{id}/review', 'App\Http\Controllers\ReviewController@save')->name('review.save');

//CART
Route::get('/cart', 'App\Http\Controllers\CartController@index')->name('cart.index');
Route::post('/cart', 'App\Http\Controllers\CartController@store')->name('cart.store');
Route::delete('/cart/{id}', 'App\Http\Controllers\CartController@destroy')->name('cart.destroy');

//CUSTOMIZATION
Route::post('/customization/generate','App\Http\Controllers\CustomizationController@generate')->name('customization.generate');
Route::get('/customization/{id}', 'App\Http\Controllers\CustomizationController@index')->name('customization.index');

//CHECKOUT
Route::get('/checkout', 'App\Http\Controllers\CheckoutController@index')->name('checkout.index');
Route::post('/checkout/confirm', 'App\Http\Controllers\CheckoutController@confirm')->name('checkout.confirm');

//ORDERS
Route::get('/orders', 'App\Http\Controllers\OrderController@index')->name('order.index');

//PROFILE
Route::get('/profile', 'App\Http\Controllers\ProfileController@index')->name('profile.index');

//ADMIN
// Route::middleware('admin')->group(function () {
    //ADMIN-STATISTICS
    Route::get('/admin', 'App\Http\Controllers\Admin\AdminStatisticsController@index')->name('admin.statistics.index');
    //ADMIN-PRODUCTS
    Route::get('/admin/products/', 'App\Http\Controllers\Admin\AdminProductController@index')->name('admin.product.index');
    Route::get('/products-download', 'App\Http\Controllers\Admin\AdminProductController@download')->name('products.download');
    Route::get('/admin/products/ordered/{order}', 'App\Http\Controllers\Admin\AdminProductController@index')->name('admin.product.ordered');
    Route::post('/admin/products/save', 'App\Http\Controllers\Admin\AdminProductController@save')->name('admin.product.save');
    Route::get('/admin/products/create', 'App\Http\Controllers\Admin\AdminProductController@create')->name('admin.product.create');
    Route::get('/admin/products/{id}', 'App\Http\Controllers\Admin\AdminProductController@show')->name('admin.product.show');
    Route::delete('/admin/products/{id}', 'App\Http\Controllers\Admin\AdminProductController@destroy')->name('admin.product.destroy');
    Route::put('/admin/products/{id}', 'App\Http\Controllers\Admin\AdminProductController@update')->name('admin.product.update');
    //ADMIN-USERS
    Route::get('/admin/users', 'App\Http\Controllers\Admin\AdminUsersController@index')->name('admin.users.index');
    //ADMIN-REVIEWS
    Route::delete('/admin/reviews/{id}', 'App\Http\Controllers\Admin\AdminReviewController@destroy')->name('admin.review.destroy');
// });
Auth::routes();
