<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminProductController;

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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/product/{product:slug}', [ProductController::class, 'show'])->name('product');

//admin Routes
Route::controller(AdminProductController::class)->group(function() {
    Route::get('/admin/product',  'index')->name('admin.products');
    Route::get('/admin/product/create', 'create')->name('admin.product.create');
    Route::post('/admin/product', 'store')->name('admin.product.store');

    Route::get('/admin/product/{product}/edit', 'edit')->name('admin.product.edit');
    Route::put('/admin/product/{product}', 'update')->name('admin.product.update');
    Route::delete('/admin/product/{product}', 'destroy')->name('admin.product.destroy');

    Route::get('/admin/products/{product}/delete-image', 'destroyImage')->name('admin.product.destroyImage');
});
