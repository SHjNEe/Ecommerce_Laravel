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


Auth::routes();

Route::get('/', [App\Http\Controllers\Frontend\FrontendController::class, 'index']);
Route::get('/collections', [App\Http\Controllers\Frontend\FrontendController::class, 'categories']);
Route::get('/collections/{category_slug}', [App\Http\Controllers\Frontend\FrontendController::class, 'products']);
Route::get('/collections/{category_slug}/{product_slug}', [App\Http\Controllers\Frontend\FrontendController::class, 'productView']);


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

        Route::post('product-color/{color_id}', 'updateProdColorQty');
        Route::get('product-color/{color_id}', 'deleteProdColorQty');

        Route::get('product-image/{product_image_id}/delete', 'destroyImage');
    });

    Route::controller(App\Http\Controllers\Admin\ColorController::class)->group(function () {
        Route::get('color', 'index')->name('color.list');
        Route::get('color/create', 'create')->name('color.create');
        Route::get('color/{color}/edit', 'edit')->name('color.edit');
        Route::get('color/{color}/delete', 'destroy')->name('color.destroy');

        Route::put('color/{color}', 'update')->name('color.update');
        Route::post('/color', 'store');
    });


    Route::controller(App\Http\Controllers\Admin\SliderController::class)->group(function () {
        Route::get('slider', 'index');
        Route::get('slider/create', 'create');
        Route::get('slider/{slider_id}/edit', 'edit');

        Route::put('slider/{slider_id}', 'update');
        Route::get('slider/{slider_id}/delete', 'destroy');

        Route::post('slider', 'store');
    });
});
