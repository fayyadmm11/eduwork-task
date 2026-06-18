<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\ProductController as PublicProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/products', [PublicProductController::class, 'index'])->name('products.index');
Route::get('/products/{product}', [PublicProductController::class, 'show'])->name('products.show');
Route::get('/product/create', [PublicProductController::class, 'create'])->name('product.create');
Route::post('/product', [PublicProductController::class, 'store'])->name('product.store');
Route::get('/product/{product}/edit', [PublicProductController::class, 'edit'])->name('product.edit');
Route::put('/product/{product}', [PublicProductController::class, 'update'])->name('product.update');
Route::delete('/product/{product}', [PublicProductController::class, 'destroy'])->name('product.destroy');

Route::get('/product-category/create', [ProductCategoryController::class, 'create'])->name('product-category.create');
Route::post('/product-category', [ProductCategoryController::class, 'store'])->name('product-category.store');
Route::get('/product-category/{productCategory}/edit', [ProductCategoryController::class, 'edit'])->name('product-category.edit');
Route::put('/product-category/{productCategory}', [ProductCategoryController::class, 'update'])->name('product-category.update');
Route::delete('/product-category/{productCategory}', [ProductCategoryController::class, 'destroy'])->name('product-category.destroy');

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified', 'admin'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::prefix('admin')->name('admin.')->middleware('admin')->group(function () {
        Route::resource('categories', CategoryController::class)->except(['show']);
        Route::resource('products', ProductController::class)->except(['show']);
    });
});

require __DIR__.'/auth.php';
