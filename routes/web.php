<?php

use App\Http\Controllers\AdminControllers;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\categoryController;
use App\Http\Controllers\client\home;
use App\Http\Controllers\client\productDescription;
use App\Http\Controllers\client\CartController;
use App\Http\Controllers\client\login;
use App\Http\Controllers\client\register;
use App\Http\Controllers\client\auth\VerificationController;
use App\Http\Controllers\client\userDashboard;
use App\Http\Controllers\paymentMethod\paypalController;
use App\Http\Controllers\Client\checkOut;
use App\Http\Controllers\Client\CustomerInfoController;
Route::get('/', [home::class, 'cats']);
Route::middleware('auth:web')->prefix('client')->group(function () {
    Route::get('/dashboard', [userDashboard::class, 'index'])->name('client.userDashboard');
});
Route::middleware('guest:web')->prefix('client')->group(function () {
    Route::get('/home', [home::class, 'cats'])->name('client.home');
    Route::get('/product/{id}', [productDescription::class, 'show'])->name('product.show');
    Route::get('/category/{id}', [categoryController::class, 'showProducts'])->name('client.listproducts');
    Route::post('/add-to-cart', [CartController::class, 'addToCart'])->name('cart.add');
    Route::get('/cart', [CartController::class, 'viewCart'])->name('cart.view');
    Route::post('/update-cart', [CartController::class, 'updateCart'])->name('cart.update');
    Route::get('/remove-cart/{id}', [CartController::class, 'removeFromCart'])->name('cart.remove');
    Route::get('/login', [login::class, 'index'])->name('client.login');
    Route::get('/register', [register::class, 'index'])->name('client.register');
    Route::post('/register', [register::class, 'register'])->name('register');

    Route::get('/verify', [VerificationController::class, 'showVerificationForm'])->name('verification.form');
    Route::post('/verify', [VerificationController::class, 'verify'])->name('verification.verify');
    Route::post('/login', [login::class, 'login'])->name('client.user');
    Route::get('/paypal', [paypalController::class, 'paywithPaypal'])->name('paypal.view');
    Route::post('/paypal/payment', [paypalController::class, 'postPaymentwithPaypal'])->name('postpayment');
    Route::get('/paypal/status', [paypalController::class, 'getPaymentStatus'])->name('status');
    Route::post('/buy-now', [checkOut::class, 'buyNow'])->name('buy.now');
    Route::get('/customer-info', [CustomerInfoController::class, 'showForm'])->name('client.customerInfo');
    Route::post('/customer-info', [CustomerInfoController::class, 'storeInfo'])->name('client.storeInfo');
    Route::get('/address/{id}', [CustomerInfoController::class, 'showAddress'])->name('client.address');
});


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



// Route::get('/', function () {
//     return view('admin.dashboard');
// })->name('admin.dashboard');