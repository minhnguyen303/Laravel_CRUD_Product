<?php

use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
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

Route::get('/', [ProductController::class, 'index']);

/*Route::post('/create', function (Request $request){
    dd($request);
})->name('create');*/


Route::post('/create', [ProductController::class, 'store']);
/*Route::get('/show/{id}', function ($id){
    return response()->json($id);
});*/
Route::get('/show/{id}', [ProductController::class, 'show']);
Route::post('/update/{id}', [ProductController::class, 'update']);
Route::get('/delete/{id}', [ProductController::class, 'delete']);
