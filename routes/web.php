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

Route::prefix('/properties')->group(function () {
    Route::get('/', [App\Http\Controllers\PropertyController::class, 'index'])->name('property');
    Route::get('/view/{prop}', [App\Http\Controllers\PropertyController::class, "view"])->name('property.show');
});

Route::get('/contact-us', function(){
    return view('pages.contact');
})->name('contact');

Route::get('/about-us', function(){
    return view('pages.about');
})->name('about');

Auth::routes();

Route::middleware(['auth'])->group(function () {

    Route::prefix('/dashboard')->group(function () {
        Route::get('/', [App\Http\Controllers\HomeController::class, 'dashboard'])->name('dashboard');

        Route::prefix('/properties')->group(function () {
            Route::get('/all', [App\Http\Controllers\PropertyController::class, 'indexDashboard'])->name('dashboard.property');
            Route::match(['get', 'post'], '/add', [App\Http\Controllers\PropertyController::class, "add"])->name('dashboard.property.add');
            Route::post('/delete', [App\Http\Controllers\PropertyController::class, "delete"])->name('dashboard.property.delete');
        });

        Route::prefix('/house-types')->group(function () {
            Route::get('/', [App\Http\Controllers\HouseTypeController::class, 'index'])->name('dashboard.type');
            Route::match(['get', 'post'], '/add', [App\Http\Controllers\HouseTypeController::class, "add"])->name('dashboard.type.add');
            Route::post('/delete', [App\Http\Controllers\HouseTypeController::class, "delete"])->name('dashboard.type.delete');
        });

        Route::prefix('/amenities')->group(function () {
            Route::get('/', [App\Http\Controllers\AmenityController::class, 'index'])->name('dashboard.amenity');
            Route::match(['get', 'post'], '/add', [App\Http\Controllers\AmenityController::class, "add"])->name('dashboard.amenity.add');
            Route::post('/delete', [App\Http\Controllers\AmenityController::class, "delete"])->name('dashboard.amenity.delete');
        });

        Route::prefix('/development-stages')->group(function () {
            Route::get('/', [App\Http\Controllers\StageController::class, 'index'])->name('dashboard.stage');
            Route::match(['get', 'post'], '/add', [App\Http\Controllers\StageController::class, "add"])->name('dashboard.stage.add');
            Route::post('/delete', [App\Http\Controllers\StageController::class, "delete"])->name('dashboard.stage.delete');
        });
    })->middleware('admin');

});
