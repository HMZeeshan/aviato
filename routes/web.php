<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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

// Route::get('/forgot-password', function () {
//     return view('screens.auth.web.forget-password');
// });

/*
|--------------------------------------------------------------------------
| Forgot Password
|--------------------------------------------------------------------------
*/
Route::get('/forgot-password', function () {
    return view('screens.auth.web.forget-password');
})->middleware('guest')->name('password.request');

Route::post('/forgot-password', function (Request $request) {
    $request->validate([
        'email' => 'required|email|exists:users,email',
    ]);

    $status = Password::sendResetLink(
        $request->only('email')
    );

    return $status === Password::RESET_LINK_SENT
        ? back()->with('status', 'Password reset link has been sent to your email.')
        : back()->withErrors(['email' => 'Unable to send reset link']);
})->middleware('guest')->name('password.email');


/*
|--------------------------------------------------------------------------
| Reset Password
|--------------------------------------------------------------------------
*/
Route::get('/reset-password/{token}', function ($token) {
    return view('screens.auth.web.reset-password', ['token' => $token]);
})->middleware('guest')->name('password.reset');

Route::post('/reset-password', function (Request $request) {

    $request->validate([
        'token' => 'required',
        'email' => 'required|email|exists:users,email',
        'password' => 'required|min:6|confirmed',
    ]);

    $status = Password::reset(
        $request->only('email', 'password', 'password_confirmation', 'token'),
        function ($user, $password) {
            $user->password = Hash::make($password);
            $user->save();
        }
    );

    return $status === Password::PASSWORD_RESET
        ? redirect()->route('login')->with('status', 'Password reset successfully. Please login.')
        : back()->withErrors(['email' => 'Invalid token or email']);
})->middleware('guest')->name('password.update');

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
