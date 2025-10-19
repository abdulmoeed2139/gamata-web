<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FrontentController;
use App\Http\Controllers\Website\HomeController;
use App\Http\Controllers\Auth\ForgotPasswordCustomController;




Route::get('/', function(){
    return redirect(app()->getLocale().'/login');
});

Route::get('/proxy-image', function (Illuminate\Http\Request $request) {
    $url = $request->query('url');
    if (!$url) abort(400, 'Missing URL');

    $response = Http::withOptions(['verify' => false])->get($url);

    return response($response->body(), 200)
        ->header('Content-Type', $response->header('Content-Type'));
});

Route::get('/related-products/{childCode}', [FrontentController::class, 'relatedProducts'])->name('related-products');
Route::get('/get-blog/{blog_id}', [FrontentController::class, 'getSingleBlog'])->name('get-single-blog');
Route::get('/get-post', [FrontentController::class, 'community'])->name('get-single-blog');


// Language-prefixed group
Route::group(['prefix' => '{lang}', 'middleware' => 'setlocale'], function () {

    Route::get('/register', [AuthController::class, 'registerForm'])->name('register.form');
    Route::post('/register', [AuthController::class, 'register'])->name('register');
    Route::get('/login', [AuthController::class, 'loginForm'])->name('login.form');
    Route::post('/login', [AuthController::class, 'login'])->name('login');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/login-by-password', [AuthController::class, 'PasswordForm'])->name('login-by-password');
    Route::post('/password-login', [AuthController::class, 'loginByPassword'])->name('loginByPassword');
    Route::get('/posts', [FrontentController::class, 'blogs'])->name('blogs');
    Route::post('/subscribe', [FrontentController::class, 'subscribe'])->name('subscribe');
    Route::get('/verify-otp', [FrontentController::class, 'verifyOTP']);
    Route::get('/contact', [FrontentController::class, 'contact'])->name('contact');
    Route::post('/insert-anonymous-inquiry', [FrontentController::class, 'InsertAnonymousInquiry'])->name('contact');
    Route::post('/create-comment', [FrontentController::class, 'createComment'])->name('create-comment');
    Route::post('/create-post', [FrontentController::class, 'createPost'])->name('create-post');
    Route::post('/like-post', [FrontentController::class, 'likePost'])->name('like-post');
    Route::get('/forgot-password', [ForgotPasswordCustomController::class, 'showForgotForm'])->name('password.request');

    // Main index page
    Route::get('/index', [FrontentController::class, 'index'])->name('index');
    Route::get('/product', [FrontentController::class, 'product'])->name('product.index');


    Route::get('/community', [FrontentController::class, 'community']);
    Route::get('/product-view/{product_id}', [FrontentController::class, 'producttInner']);

    Route::get('/element', [HomeController::class, 'element']);
    Route::get('/welcome', [HomeController::class, 'welcome']);
    Route::get('/app-banner', [FrontentController::class, 'appBanner'])->name('appBanner');


    Route::post('/forgot-password', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');

    Route::get('/dashboard', function () {
        return view('auth.dashboard');
    })->middleware('auth')->name('dashboard');




    Route::get('/my-plans', function () {
        return view('websitePages.myPlans');
    })->name('myPlans');




// Route::get('/', [HomeController::class, 'index']);
Route::get('/resend-otp', [AuthController::class, 'resendOTP']);
// Route::post('/otp-verify', [AuthController::class, 'getToken']);
Route::post('/otp-verify', [AuthController::class, 'verifyOtp']);
// Route::get('/send-otp', [AuthController::class, 'verifyNumber']);
Route::get('/get-result', [AuthController::class, 'verifyMobileNumber']);
Route::get('/sign-in', [AuthController::class, 'signIn']);
Route::get('/get-otp-for-forget-password', [AuthController::class, 'verifyMobileNumber']);
Route::get('/forgot-password/verify-otp', [ForgotPasswordCustomController::class, 'verifyOtp'])->name('password.verifyOtp');
Route::post('/forgot-password/verifyotp', [AuthController::class, 'verifyOtp'])->name('password.verifyOtp');
Route::post('/forgot-password/send-otp', [ForgotPasswordCustomController::class, 'sendOtp'])->name('password.sendOtp');
Route::get('/forgot-password/reset', [ForgotPasswordCustomController::class, 'resetPassword'])->name('password.reset');
Route::post('/forgot-password/reset', [AuthController::class, 'resetPassword']);
});
