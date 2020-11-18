<?php

use App\Http\Controllers\API\CategoryController;
use App\Http\Controllers\API\NewsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

//todo добавить авторизацию через трокен
//Route::group(['middleware' => 'auth:api'], function () {
    Route::prefix('admin')->group(function () {
        Route::prefix('category')->group(function () {
            Route::get('/', [CategoryController::class, 'index'])->name('index');
            Route::get('{id}', [CategoryController::class, 'get'])->name('get');
            Route::post('/', [CategoryController::class, 'post'])->name('post');
            Route::put('{id}', [CategoryController::class, 'put'])->name('put');
            Route::delete('{id}', [CategoryController::class, 'delete'])->name('delete');
        });
        Route::prefix('news')->group(function () {
            Route::get('/', [NewsController::class, 'index'])->name('index');
            Route::get('{id}', [NewsController::class, 'get'])->name('get');
            Route::post('/', [NewsController::class, 'post'])->name('post');
            Route::put('{id}', [NewsController::class, 'put'])->name('put');
            Route::delete('{id}', [NewsController::class, 'delete'])->name('delete');
        });
    });
//});
