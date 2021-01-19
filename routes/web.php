<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

//Session işlemleri
Route::get('/giriş-yap', 'FrontAuth\FrontLoginController@login')->name('front.login');
Route::post('/giriş-yap', 'FrontAuth\FrontLoginController@loginSubmit')->name('front.login-submit');
Route::get('/kayıt-ol', 'FrontAuth\FrontRegisterController@register')->name('front.register');
Route::post('/kayıt-ol', 'FrontAuth\FrontRegisterController@registerPost')->name('front.register-submit');
Route::get('/çıkış-yap', 'FrontAuth\FrontLoginController@logout')->name('front.logout');

//Ana sayfa
Route::get('/', 'HomeController@index')->name('front.home');

//Kategori araması
Route::get('/{category}/{subCategory}', 'HomeController@categoryPage')->name('front.category');

//Sepet işlemleri
Route::get('/sepetim', 'CartController@cart')->name('front.cart');
Route::post('/sepete-ekle', 'CartController@addToCart')->name('front.add-to-cart');
Route::post('/increase-qty', 'CartController@increaseQuantity')->name('front.increase-quantity');
Route::post('/decrease-qty', 'CartController@decreaseQuantity')->name('front.decrease-quantity');
Route::post('/sepetten-çıkar/{id}', 'CartController@removeFromCart')->name('front.remove-from-cart');
Route::post('/sepeti-boşalt/{id}', 'CartController@emptyCart')->name('front.empty-cart');

// Ödeme
Route::get('/ödeme-sayfası', 'PaymentController@checkout')->name('front.checkout');

// Hakkımızda
Route::get('/hakkımızda', 'HomeController@about')->name('front.about');

//İletişim
Route::get('/iletişim', 'HomeController@contact')->name('front.contact');

//Kullanıcı profili
Route::get('/profilim', 'HomeController@profile')->name('front.profile');

//Siparişlerim
Route::get('/siparişlerim', 'HomeController@orders')->name('front.orders');

//Ürünler
Route::get('/ürünler', 'HomeController@products')->name('front.products');
Route::get('/ürün-detay/{slug}', 'HomeController@productDetail')->name('front.product-detail');

Auth::routes();
               //      ---ADMIN---    //
Route::namespace('Admin')->group(function () {
    Route::get('/genel-tablolar', 'HomeController@home')->name('admin.home');
    Route::resource('/categories', 'CategoryController')->except(['show', 'create']);
    Route::resource('/sub-categories', 'SubCategoryController')->except(['show', 'create']);
    Route::resource('/products', 'ProductController')->except(['show']);
    Route::resource('/orders', 'OrderController')->except(['show']);
    Route::resource('/customers', 'CustomerController')->except(['show']);
    Route::resource('/messages', 'MessageController')->except(['edit', 'update']);
});
