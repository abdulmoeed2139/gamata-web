<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FrontentController;
use App\Http\Controllers\Website\HomeController;
use App\Http\Controllers\Auth\ForgotPasswordCustomController;

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

Route::get('/', [HomeController::class, 'index']);
Route::get('/community', [FrontentController::class, 'community']);
Route::get('/product', [HomeController::class, 'product']);
Route::get('/product-view', [FrontentController::class, 'producttInner']);
Route::get('/element', [HomeController::class, 'element']);
Route::get('/welcome', [HomeController::class, 'welcome']);

Route::get('/app-banner', [FrontentController::class, 'appBanner'])->name('appBanner');

// Register
Route::get('/register', [AuthController::class, 'registerForm'])->name('register.form');
Route::post('/register', [AuthController::class, 'register'])->name('register');

// Login
Route::get('/login', [AuthController::class, 'loginForm'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login');

// Logout
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

//forgot password
Route::get('/forgot-password', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('/forgot-password', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');

Route::get('/forgot-password', function () {
    return view('auth.forgot-password');
})->name('password.request');


// Protected Dashboard
Route::get('/dashboard', function () {
    return view('auth.dashboard');
})->middleware('auth')->name('dashboard');

Route::get('/login2', function () {
    return view('auth.login2');
})->name('login2');


Route::get('/posts', [FrontentController::class, 'blogs'])->name('blogs');
Route::post('/subscribe', [FrontentController::class, 'subscribe'])->name('subscribe');
Route::get('/get-blog/{blog_id}', [FrontentController::class, 'getSingleBlog'])->name('get-single-blog');

Route::get('/my-plans', function () {
    return view('websitePages.myPlans');
})->name('myPlans');

Route::get('/index', [FrontentController::class, 'index'])->name('index');
Route::get('/verify-otp', [FrontentController::class, 'verifyOTP']);

Route::get('/contact', function () {
    return view('websitePages.contact');
})->name('contact');


Route::post('/otp-verify', [AuthController::class, 'verifyOTP']);

Route::get('/send-otp', [AuthController::class, 'verifyNumber']);
Route::get('/sign-in', [AuthController::class, 'signIn']);

Route::get('/forgot-password', [ForgotPasswordCustomController::class, 'showForgotForm'])->name('password.request');
Route::post('/forgot-password/send-otp', [ForgotPasswordCustomController::class, 'sendOtp'])->name('password.sendOtp');
Route::post('/forgot-password/verify-otp', [ForgotPasswordCustomController::class, 'verifyOtp'])->name('password.verifyOtp');
Route::post('/forgot-password/reset', [ForgotPasswordCustomController::class, 'resetPassword'])->name('password.reset');
