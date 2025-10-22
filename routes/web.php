<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Website\HomeController;
use Illuminate\Support\Facades\Auth;
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
Route::get('/community', [HomeController::class, 'community']);
Route::get('/product', [HomeController::class, 'product']);
Route::get('/product-view', [HomeController::class, 'producttInner']);
Route::get('/element', [HomeController::class, 'element']);
Route::get('/welcome', [HomeController::class, 'welcome']);


use App\Http\Controllers\AuthController;

// Register
Route::get('/register', [AuthController::class, 'registerForm'])->name('register.form');
Route::post('/register', [AuthController::class, 'register'])->name('register');

// Login
Route::get('/login', [AuthController::class, 'loginForm'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login');

// Logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

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


Route::get('/posts', function () {
    return view('websitePages.blogs');
})->name('blogs');
Route::get('/my-plans', function () {
    return view('websitePages.myPlans');
})->name('myPlans');

Route::get('/index', function () {
    return view('websitePages.index');
})->name('index');

Route::get('/contact', function () {
    return view('websitePages.contact');
})->name('contact');

Route::get('/app-banner', function () {
    return view('websitePages.app-banner');
})->name('appBanner');



Route::get('/forgot-password', [ForgotPasswordCustomController::class, 'showForgotForm'])->name('password.request');
Route::post('/forgot-password/send-otp', [ForgotPasswordCustomController::class, 'sendOtp'])->name('password.sendOtp');
Route::post('/forgot-password/verify-otp', [ForgotPasswordCustomController::class, 'verifyOtp'])->name('password.verifyOtp');
Route::post('/forgot-password/reset', [ForgotPasswordCustomController::class, 'resetPassword'])->name('password.reset');
