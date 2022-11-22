<?php

use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CartController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Web\HomeController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Web\ProductController as WebProductController;
use App\Http\Controllers\Web\CartController as WebCartController;
use App\Http\Controllers\Web\CheckoutController;
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

Route::get('/welcome', function () {
    return view('layout.master');
});
Route::get('index', function () {
    return view('home');
});
Route::get('/', [HomeController::class, 'index'])->name('trangchu');

// Route::resource('trangchu', HomeController::class);


// -------------
Route::prefix('admin')->group(function () {
    Route::resource('category', CategoryController::class);
    Route::resource('brand', BrandController::class);
    Route::resource('product', ProductController::class);
    Route::resource('cart', CartController::class);
    Route::resource('user', UserController::class);
});
Route::get('/chi-tiet-san-pham/{id}', [WebProductController::class, 'show'])->name('web_product.show');
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/logout', [App\Http\Controllers\HomeController::class, 'logout'])->name('logout');



//------------------Cart
Route::get('/gio-hang', [WebCartController::class, 'index'])->name('web.cart.index');
Route::post('/them-vao-gio-hang', [WebCartController::class, 'add_to_cart'])->name('web.cart.add_to_cart');
Route::post('/cap-nhat-gio-hang', [WebCartController::class, 'update_cart'])->name('web.cart.update_cart');
//---------------login---Checkout
Route::get('/login-chekcout', [CheckoutController::class, 'login_checkout'])->name('web.login-checkout.index');
Route::get('/logout_checkout', [CheckoutController::class, 'logout_checkout'])->name('web.logout-checkout.logout');
Route::post('/login-chekcout', [CheckoutController::class, 'add_customer'])->name('web.login-checkout.login');
Route::post('/login-customer', [CheckoutController::class, 'login_customer'])->name('web.login-customer.login');

Route::get('/chekcout', [CheckoutController::class, 'checkout'])->name('web.checkout.index');
Route::post('/chekcout', [CheckoutController::class, 'save_checkout'])->name('web.checkout.save');
Route::get('/payment', [CheckoutController::class, 'payment'])->name('payment');

