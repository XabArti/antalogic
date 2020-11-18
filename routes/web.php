<?php

use App\Http\Controllers\Admin\IndexController;
use App\Http\Controllers\Front\CategoryController;
use App\Http\Controllers\Front\NewsController;
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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::namespace('App\Http\Controllers')->group(function () {
    Auth::routes();
});

Route::get('/', [CategoryController::class, 'index'])->name('index');

Route::prefix('category')->group(function () {
    Route::name('category.')->group(function () {
        Route::get('/', [CategoryController::class, 'index'])->name('index');
        Route::get('{id}', [CategoryController::class, 'get'])->name('get');
    });
});

Route::prefix('news')->group(function () {
    Route::name('news.')->group(function () {
        Route::get('/', [NewsController::class, 'index'])->name('index');
        Route::get('{id}', [NewsController::class, 'get'])->name('get');
    });
});

Route::group(['middleware' => 'auth'], function () {
    Route::prefix('admin')->group(function () {
        Route::get('/', [IndexController::class, 'index'])->name('index');
    });
});
