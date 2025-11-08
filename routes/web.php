<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('screens.web.index');
})->name('index');

// Route::get('/shop', function () {
//     return view('screens.web.shop.shop');
// });
Route::controller(ProductController::class)->group(function(){
    Route::get('/shop','index')->name('shop');
});

Route::get('/product', function () {
    return view('screens.web.shop.product-single');
});

Route::get('/cart', function () {
    return view('screens.web.cart.cart');
});

Route::get('/checkout', function () {
    return view('screens.web.checkout.checkout');
});

Route::get('/thankyou', function () {
    return view('screens.web.checkout.confirmation');
});
Route::controller(AuthController::class)->group(function () {
    Route::middleware('guest')->group(function () {
        Route::get('/login',  'loginView')->name('login');
        Route::post('/login',  'login')->name('login');

        Route::get('/register',  'registerView')->name('register');
        Route::post('/register',  'register')->name('register');
    });
    Route::middleware('auth')->group(function () {
        Route::post('/logout',  'logout')->name('logout');
    });
    // Route::post('/logout',  'logout')->middleware('auth')->name('logout');
});

Route::get('/forgot-password', function () {
    return view('screens.auth.web.forget-password');
});

Route::get('/customer-dashboard', function () {
    return view('screens.web.dashboard.dashboard');
});

Route::get('/customer-orders', function () {
    return view('screens.web.dashboard.order');
});

Route::get('/customer-address', function () {
    return view('screens.web.dashboard.address');
});

Route::get('/customer-profile', function () {
    return view('screens.web.dashboard.profile-details');
});

Route::get('/blogs', function () {
    return view('screens.web.blog.blogs');
});

Route::get('/blog-detail', function () {
    return view('screens.web.blog.blog-single');
});

Route::get('/about', function () {
    return view('screens.web.about');
});

Route::get('/contact', function () {
    return view('screens.web.contact');
});

Route::get('/faq', function () {
    return view('screens.web.faq');
});
