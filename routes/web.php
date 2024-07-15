<?php

use App\Http\Controllers\BannerController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderDeliveringController;
use App\Http\Controllers\OutstandingController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\UploadController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserMaxController;

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
// Route::get('/test', fn () => view('test'));

// ================================================ START ================================================

Route::group(['middleware' => 'myauth'], function () {

    Route::get('/', fn () => redirect('dashboard'));
    Route::get('/test', fn () => view('test'))->name('test');
    Route::any("/login", [LoginController::class, 'index'])->name("login");

    // =============== User ==============================================================================================
    Route::get('/user',  [UserController::class, 'index'])->name('user');
    // ============ END  User ============================================================================================

    
    // =============== UserMax ==============================================================================================
    Route::any('/role/max',  [UserMaxController::class, 'index'])->name('user-max');
    // ============ END  UserMax ============================================================================================

    
    // =============== Dasboard ==============================================================================================
    Route::get('/dashboard',  [DashboardController::class, 'dashboard'])->name('dashboard');
    // ============ END  Dasboard ============================================================================================

    
    // =============== Contact ==============================================================================================
    Route::get('/contact',  [ContactController::class, 'index'])->name('contact');
    // ============ END  Contact ============================================================================================


    // =============== Products ==============================================================================================
    Route::get('/products', [ProductsController::class, 'list'])->name('products');
    Route::any('/products/create', [ProductsController::class, 'create'])->name('product-create');
    Route::any('/products/detail', [ProductsController::class, 'detail'])->name('product-detail');
    Route::any('/products/delete', [ProductsController::class, 'detail'])->name('product-delete');
    Route::any('/products/images', [ProductsController::class, 'images'])->name('product-images');
    // ============ END  Products ============================================================================================


    // =============== Categories ============================================================================================
    Route::get('/categories', [CategoryController::class, 'list'])->name('categories');
    Route::any('/categories/create', [CategoryController::class, 'create'])->name('category-create');
    Route::any('/categories/detail', [CategoryController::class, 'detail'])->name('category-detail');
    Route::any('/categories/delete', [CategoryController::class, 'detail'])->name('category-delete');
    // ============ END  Categories ==========================================================================================


    // =============== Post ==================================================================================================
    Route::get('/posts', [PostController::class, 'list'])->name('posts');
    Route::any('/posts/create', [PostController::class, 'create'])->name('posts-create');
    Route::any('/posts/detail', [PostController::class, 'detail'])->name('posts-detail');
    Route::any('/posts/delete', [PostController::class, 'detail'])->name('posts-delete');
    // ============ END  Post ================================================================================================


    // =============== Color ==================================================================================================
    Route::get('/color', [ColorController::class, 'list'])->name('color');
    Route::any('/color/create', [ColorController::class, 'create'])->name('color-create');
    Route::any('/color/detail', [ColorController::class, 'detail'])->name('color-detail');
    Route::any('/color/delete', [ColorController::class, 'detail'])->name('color-delete');
    // ============ END  Color ================================================================================================


    // =============== Banner ================================================================================================
    Route::get('/banner', [BannerController::class, 'list'])->name('banner');
    Route::any('/banner/create', [BannerController::class, 'create'])->name('banner-create');
    Route::any('/banner/delete', [BannerController::class, 'detail'])->name('banner-delete');
    // ============ END  Banner ==============================================================================================


    // =============== Outstanding ===========================================================================================
    Route::get('/outstanding', [OutstandingController::class, 'list'])->name('outstanding');
    Route::any('/outstanding/create', [OutstandingController::class, 'create'])->name('outstanding-create');
    Route::any('/outstanding/delete', [OutstandingController::class, 'detail'])->name('outstanding-delete');
    // ============ END  Outstanding =========================================================================================


    // =============== Order-wait ============================================================================================
    Route::get('/order-wait', [OrderController::class, 'list'])->name('order-wait');
    Route::get('/order-wait/detail', [OrderController::class, 'detail'])->name('order-wait-detail');

    // ============ END  Order-wait ==========================================================================================


    // =============== Order-delivering ======================================================================================
    Route::get('/order-delivering', [OrderDeliveringController::class, 'list'])->name('order-delivering');
    Route::get('/order-delivering/detail', [OrderDeliveringController::class, 'detail'])->name('order-delivering-detail');

    // ============ END  Order-delivering ====================================================================================


});
