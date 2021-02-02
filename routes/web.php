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

Auth::routes();
               //      ---ADMIN---    //
Route::namespace('Admin')->middleware(['admin'])->group(function () {
    Route::get('/genel-tablolar', 'HomeController@home')->name('admin.home');
    Route::resource('categories', 'CategoryController')->except(['show', 'create']);
    Route::resource('sub-categories', 'SubCategoryController')->except(['show', 'create']);
    Route::resource('products', 'ProductController');
    Route::resource('orders', 'OrderController')->except(['show']);
    Route::post('add-product-to-order', 'OrderController@addProducts')->name("admin.add-product");
    Route::resource('customers', 'CustomerController')->except(['show']);
    Route::resource('messages', 'MessageController')->except(['edit', 'update']);
});

//Session işlemleri
Route::get('/giriş-yap', 'FrontAuth\FrontLoginController@login')->name('front.login');
Route::post('/giriş-yap', 'FrontAuth\FrontLoginController@loginSubmit')->name('front.login-submit');
Route::get('/kayıt-ol', 'FrontAuth\FrontRegisterController@register')->name('front.register');
Route::post('/kayıt-ol', 'FrontAuth\FrontRegisterController@registerPost')->name('front.register-submit');

//Ana sayfa
Route::get('/', 'HomeController@index')->name('front.home');
Route::get('/çıkış-yap', 'FrontAuth\FrontLoginController@logout')->name('front.logout');

//Ürünler
Route::get('/ürünler', 'HomeController@products')->name('front.products');
Route::get('/ürün-detay/{slug}', 'HomeController@productDetail')->name('front.product-detail');

//Kategori araması
Route::get('/{category}/{subCategory}', 'HomeController@categoryPage')->name('front.category');

// Hakkımızda
Route::get('/hakkımızda', 'HomeController@about')->name('front.about');

// İletişim
Route::get('/iletişim', 'HomeController@contact')->name('front.contact');
Route::post('/iletişim', 'HomeController@sendMessage')->name('front.send-message');

//Diğer Sayfalar
Route::get('/kvkk-politikamiz', 'HomeController@kvkkPage')->name('front.kvkk');
Route::get('/iptal-ve-iade-kosulları', 'HomeController@cancelationCondition')->name('front.cancel');
Route::get('/mesafeli-satis-sozlesmesi', 'HomeController@distanceContract')->name('front.distance-contract');

Route::middleware('session')->group(function () {

        //Sepet işlemleri
        Route::get('/sepetim', 'CartController@cart')->name('front.cart');
        Route::post('/sepete-ekle', 'CartController@addToCart')->name('front.add-to-cart');
        Route::post('/increase-qty', 'CartController@increaseQuantity')->name('front.increase-quantity');
        Route::post('/decrease-qty', 'CartController@decreaseQuantity')->name('front.decrease-quantity');
        Route::post('/sepetten-çıkar/{id}', 'CartController@removeFromCart')->name('front.remove-from-cart');
        Route::post('/sepeti-boşalt/{id}', 'CartController@emptyCart')->name('front.empty-cart');

        // Ödeme
        Route::get('/ödeme-sayfası', 'PaymentController@checkout')->name('front.checkout');
        Route::post('/get-districts-by-city', 'PaymentController@getDistrict')->name('front.get-districts');
        Route::post('/siparisiniz-alindi', 'PaymentController@completeOrder')->name('front.complete-order');

        //Kullanıcı profili
        Route::get('/profilim', 'CustomerController@profile')->name('front.profile');
        Route::get('/profilim-detay', 'CustomerController@profileDetail')->name('front.profile-detail');
        Route::post('/profilim-detay', 'CustomerController@profileUpdate')->name('front.profile-update');

        //Siparişlerim
        Route::get('/siparislerim', 'CustomerController@customerOrders')->name('front.orders');
        Route::post('/siparislerim/{ordercode}', 'CustomerController@cancelOrder')->name('front.cancel-order');
        // Route::get('/siparis-detay/{order_code}', 'CustomerController@customerOrderDetail')->name('front.order-detail');
});


