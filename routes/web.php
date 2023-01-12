<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index']);

    //Category
    Route::controller(App\Http\Controllers\Admin\CategoryController::class)->group(function () {
        Route::get('category', 'index')->name('category.list');
        Route::get('category/create', 'create')->name('category.create');
        Route::get('category/{category}/edit', 'edit')->name('category.edit');

        Route::post('category', 'store')->name('category.store');
        Route::put('category/{category}', 'update')->name('category.update');
        Route::delete('category/{category}', 'destroy')->name('category.delete');
    });

    Route::get('brands', App\Http\Livewire\Admin\Brand\Index::class)->name('brand.index');

    Route::controller(App\Http\Controllers\Admin\ProductController::class)->group(function () {

        Route::get('product', 'index')->name('product.list');
        Route::get('product/create', 'create')->name('product.create');
        Route::get('product/{product}/edit', 'edit')->name('product.edit');
        Route::get('product/{product}/delete', 'destroy')->name('product.destroy');
        Route::put('product/{product}/edit', 'update')->name('product.update');
        Route::post('product', 'store');

        Route::get('product-image/{product_image_id}/delete', 'destroyImage');
    });
});
