<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CartController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\OderController;
use App\Http\Controllers\Web\HomeController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SlideController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\GroupController;
use App\Http\Controllers\Web\ProductController as WebProductController;
use App\Http\Controllers\Web\CartController as WebCartController;
use App\Http\Controllers\Web\CheckoutController;
use App\Http\Controllers\Web\TaskController;
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




//login-admin-----------


// -------------

// Route::get('login', [AdminController::class, 'loginView'])->name('login.admin');
// Route::get('logout', [AdminController::class, 'logout'])->name('logout');
// Route::post('admin-dashboad', [AdminController::class, 'login'])->name('admin-dashboad.admin');
// Route::get('dashboad', [AdminController::class, 'dashboad'])->name('dashboad.admin');

//==============
Route::get('/login', [UserController::class, 'viewLogin'])->name('login');
Route::post('handdle-login', [UserController::class, 'login'])->name('handdle-login');


Route::get('/register', [UserController::class, 'viewRegister'])->name('viewRegister');
Route::post('/handdle-register', [UserController::class, 'register'])->name('handdle-register');

Route::middleware(['auth', 'revalidate'])->group(function () {
    Route::get('dashboard', function () {
        return view('admin.dashboad.index');
    })->name('dashboard.home');
    Route::get('master', function () {
        return view('layout.master');
    })->name('master');
    Route::post('logout', [UserController::class, 'logout'])->name('logout');
Route::prefix('admin')->group(function () {
    //category
    Route::prefix('category')->group(function () {
        Route::put('SoftDeletes/{id}', [CategoryController::class, 'softdeletes'])->name('category.softdeletes');
        Route::get('trash', [CategoryController::class, 'trash'])->name('category.trash');
        Route::put('restoredelete/{id}', [CategoryController::class, 'restoredelete'])->name('category.restoredelete');
    });
    Route::resource('category', CategoryController::class);
    //brand
    Route::prefix('brand')->group(function () {
        Route::put('SoftDeletes/{id}', [BrandController::class, 'softdeletes'])->name('brand.softdeletes');
        Route::get('trash', [BrandController::class, 'trash'])->name('brand.trash');
        Route::put('restoredelete/{id}', [BrandController::class, 'restoredelete'])->name('brand.restoredelete');
    });
    Route::resource('brand', BrandController::class);
    //product
    Route::prefix('product')->group(function () {
        Route::put('SoftDeletes/{id}', [ProductController::class, 'softdeletes'])->name('product.softdeletes');
        Route::get('trash', [ProductController::class, 'trash'])->name('product.trash');
        Route::put('restoredelete/{id}', [ProductController::class, 'restoredelete'])->name('product.restoredelete');

    });//mmm
    Route::resource('product', ProductController::class);
//user
    Route::prefix('user')->group(function () {

    });
    Route::resource('user', UserController::class);
//group
    Route::prefix('group')->group(function () {
        Route::get('/detail/{id}', [GroupController::class, 'detail'])->name('group.detail');
        Route::put('/group_detail/{id}', [GroupController::class, 'group_detail'])->name('group.group_detail');
    });
    Route::resource('group', GroupController::class);

//customer
    Route::prefix('customer')->group(function () {

    });
    Route::resource('customer', CustomerController::class);
//oder
    Route::prefix('oder')->group(function () {
        Route::get('export', [OderController::class, 'export'])->name('oder.exel');


    });
    Route::resource('oder', OderController::class);
    //slider

});
});

Route::get('export', [ProductController::class, 'export'])->name('product.exel');



























































Route::get('/chi-tiet-san-pham/{id}', [WebProductController::class, 'show'])->name('web_product.show');
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/logout', [App\Http\Controllers\HomeController::class, 'logout'])->name('logout');


Route::get('/', [HomeController::class, 'index'])->name('trangchu');
//------------------Cart
Route::resource('cart', CartController::class);
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


// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
