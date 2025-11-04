<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('screens.web.index');
});

Route::get('/shop', function () {
    return view('screens.web.shop.shop');
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

Route::get('/login', function () {
    return view('screens.auth.web.login');
});

Route::get('/register', function () {
    return view('screens.auth.web.register');
});

Route::get('/forgot-password', function () {
    return view('screens.auth.web.forget-password');
});


