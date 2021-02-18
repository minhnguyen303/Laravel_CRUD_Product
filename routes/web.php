<?php

use App\Http\Controllers\ProductController;
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

Route::get('/', function () {
    return redirect()->route('product.index');
});

Route::prefix('admin')->group(function () {
    Route::get('/', [ProductController::class, 'index'])->name('product.index');
    Route::get('/create', [ProductController::class, 'create'])->name('product.create');
    Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
    Route::get('/show/{id}', [ProductController::class, 'show'])->name('product.show');
    Route::get('/delete/{id}', [ProductController::class, 'delete'])->name('product.delete');

    Route::post('/create', [ProductController::class, 'store'])->name('product.store');
    Route::post('/edit/{id}', [ProductController::class, 'update'])->name('product.update');
});
