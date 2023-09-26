<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::middleware(['auth'])->group(function () {

    Route::prefix('/dashboard')->group(function () {
        Route::get('/', [App\Http\Controllers\HomeController::class, 'dashboard'])->name('dashboard');

        Route::prefix('/properties')->group(function () {
            Route::get('/', [App\Http\Controllers\PropertyController::class, 'indexDashboard'])->name('dashboard.property');
            Route::match(['get', 'post'], '/add', [App\Http\Controllers\PropertyController::class, "add"])->name('dashboard.property.add');
        });

        Route::prefix('/house-types')->group(function () {
            Route::get('/', [App\Http\Controllers\HouseTypeController::class, 'index'])->name('dashboard.type');
            Route::match(['get', 'post'], '/add', [App\Http\Controllers\HouseTypeController::class, "add"])->name('dashboard.type.add');
        });
    })->middleware('admin');
});
