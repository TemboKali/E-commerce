<?php
use App\Http\Controllers\AdminControllers;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\categoryController;
use App\Http\Controllers\AdminSettings;
use App\Http\Controllers\Auth\logout;
use App\Http\Controllers\paymentIntegration\paymentMethods;
Route::middleware(['guest:admin'])->prefix('admin')->group(
    function () {
        Route::get('login', [LoginController::class, 'showLoginForm'])->name('admin.login');
        Route::post('login', [LoginController::class, 'login']);
    }
);
Route::middleware(['auth:admin'])->prefix('admin')->group(function () {
    Route::get('admin/dashboard', [AdminControllers::class, 'index'])->name('admin.dashboard');
    Route::get('admin/category', [categoryController::class, 'index'])->name('admin.category');
    Route::get('admin/settings', [AdminSettings::class, 'index'])->name('admin.settings');
    Route::delete('product/{product}', [CategoryController::class, 'deleteProduct'])->name('product.delete');
    Route::post('/category', [categoryController::class, 'storeCategory'])->name('admin.store');
    Route::post('/product', [categoryController::class, 'storeProduct'])->name('admin.product');
    Route::put('/product/{product}', [categoryController::class, 'updateProduct']);
    Route::post('/product/{product}/stock', [categoryController::class, 'changeStockStatus']);
    Route::post('/admin/logout', [logout::class, 'logout'])->name('admin.logout');
    Route::get('/admin/payment', [paymentMethods::class, 'index'])->name('admin.payment');
    Route::post('/admin/payment-method-types', [paymentMethods::class, 'storePaymentMethodType'])
        ->name('admin.payment_methods.type.store');
    Route::post('/admin/payment-methods', [paymentMethods::class, 'storePaymentMethod'])
        ->name('admin.payment_methods.store');
});