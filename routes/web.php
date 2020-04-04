<?php

require 'admin.php';


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

Route::view('/', 'site.pages.home');
Route::get('/', 'Site\HomeController@index')->name('home');

Auth::routes();
Route::group(['middleware' => ['auth']], function () {
    Route::get('/checkout', 'Site\CheckoutController@getCheckout')->name('checkout.index');
    Route::post('/checkout/order', 'Site\CheckoutController@placeOrder')->name('checkout.place.order');
    Route::get('checkout/payment/complete', 'Site\CheckoutController@complete')->name('checkout.payment.complete');
});
Route::get('/category/{slug}', 'Site\CategoryController@show')->name('category.show');

Route::get('/product/{slug}', 'Site\ProductController@show')->name('product.show');
Route::post('/product/add/cart', 'Site\ProductController@addToCart')->name('product.add.cart');
Route::get('/product/add/cart/{sku}', 'Site\ProductController@addToCartBySku')->name('product.add.cart.sku');
Route::get('/search', 'Site\ProductController@search')->name('product.search');
Route::get('/shop', 'Site\ProductController@shop')->name('shop');
Route::get('/shop', 'Site\ProductController@sort')->name('shop.sort');

Route::get('/shop/brand/{slug}', 'Site\BrandController@show')->name('brand.show');

Route::get('/cart', 'Site\CartController@getCart')->name('checkout.cart');
Route::get('/cart/item/{id}/remove', 'Site\CartController@removeItem')->name('checkout.cart.remove');
Route::get('/cart/clear', 'Site\CartController@clearCart')->name('checkout.cart.clear');
Route::post('/cart/update', 'Site\CartController@UpdateCart')->name('checkout.cart.update');
