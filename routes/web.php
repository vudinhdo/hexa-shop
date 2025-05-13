<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
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

Route::get('/', [HomeController::class, "index"]);
Route::get('/about', [HomeController::class, "about"])->name("about");
Route::get('contact', [HomeController::class, "contact"])->name("contact");

Route::get('products', [ProductController::class, "list"])->name("products");
Route::get("/detail-product/{product}", [ProductController::class, "detail"])->name("detail-product");
Route::get('/category/{id}', [ProductController::class, 'productByCategory'])->name('category');
Route::get("/search", [ProductController::class, "search"])->name("products.search");

Route::post('/cart/add/{id}', [CartController::class, 'addToCart'])->name('cart.add');
Route::get('/cart', [CartController::class, 'show'])->name('cart.show');

Route::get('/login', [UserController::class, 'showPageLogin'])->name('login');
Route::post('/login', [UserController::class, 'login'])->name('login.post');
Route::get('/register', [UserController::class, 'showPageRegister'])->name('register');
Route::post('/register', [UserController::class, 'register'])->name('register.post');
Route::get('/forgot-password', [UserController::class, 'showForgotForm'])->name('forgot.password');
Route::post('/forgot-password', [UserController::class, 'sendCode']);
Route::get('/verify-code', [UserController::class, 'showVerifyCodeForm'])->name('show.verify.code.form');
Route::post('/verify-code', [UserController::class, 'verifyCode'])->name('verify.code');
Route::get('/reset-password', [UserController::class, 'showResetPasswordForm'])->name('show.reset.password.form');
Route::post('/reset-password', [UserController::class, 'resetPassword'])->name('reset.password');
Route::get('profile', action: [UserController::class, 'showProfile'])->name('profile');
