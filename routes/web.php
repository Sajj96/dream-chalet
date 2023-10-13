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
    Route::get('/{prop?}', [App\Http\Controllers\PropertyController::class, 'index'])->name('property');
    Route::get('/view/{prop}', [App\Http\Controllers\PropertyController::class, "view"])->name('property.show');
    Route::get('/download/{id}', [App\Http\Controllers\PropertyController::class, "downloadFile"])->name('property.download')->middleware('auth');
});

Route::get('/contact-us', function(){
    return view('pages.contact');
})->name('contact');

Route::get('/about-us', function(){
    return view('pages.about');
})->name('about');


Route::get('forget-password', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::post('forget-password', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post'); 
Route::get('reset-password/{token}', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');

Route::prefix('/inquiries')->group(function () {
    Route::post('/add', [App\Http\Controllers\InquiryController::class, "add"])->name('inquiry.create');
});

Route::prefix('/transactions')->group(function () {
    Route::get('/call-back', [App\Http\Controllers\TransactionController::class, "callback"])->name('transaction.callback');
    Route::match(['get', 'post'],'/checkout', [App\Http\Controllers\TransactionController::class, 'checkout'])->name('checkout');
    Route::post('/add', [App\Http\Controllers\TransactionController::class, "add"])->name('transaction.create');
});

Route::prefix('/posts')->group(function () {
    Route::get('/', [App\Http\Controllers\PostController::class, 'getAll'])->name('post');
    Route::get('/view/{prop}', [App\Http\Controllers\PostController::class, "view"])->name('post.show');
});

Auth::routes();

Route::middleware(['auth'])->group(function () {

    Route::prefix('/users')->group(function () {
        Route::match(['get', 'post'],'/my-profile', [App\Http\Controllers\UserController::class, 'profile'])->name('profile');
    });

    Route::prefix('/reviews')->group(function () {
        Route::post('/', [App\Http\Controllers\ReviewController::class, 'add'])->name('review.create');
    });

    Route::prefix('/dashboard')->group(function () {
        Route::get('/', [App\Http\Controllers\HomeController::class, 'dashboard'])->name('dashboard');

        Route::prefix('/users')->group(function () {
            Route::get('/', [App\Http\Controllers\UserController::class, 'index'])->name('dashboard.user');
            Route::get('/view/{id}', [App\Http\Controllers\UserController::class, "view"])->name('dashboard.user.show');
            Route::post('/delete', [App\Http\Controllers\UserController::class, "delete"])->name('dashboard.user.delete');
        });

        Route::prefix('/properties')->group(function () {
            Route::get('/all', [App\Http\Controllers\PropertyController::class, 'indexDashboard'])->name('dashboard.property');
            Route::match(['get', 'post'], '/add', [App\Http\Controllers\PropertyController::class, "add"])->name('dashboard.property.add');
            Route::match(['get', 'post'], '/edit/{id?}', [App\Http\Controllers\PropertyController::class, "edit"])->name('dashboard.property.edit');
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

        Route::prefix('/orders')->group(function () {
            Route::get('/', [App\Http\Controllers\InquiryController::class, 'index'])->name('dashboard.order');
            Route::get('/view/{id}', [App\Http\Controllers\InquiryController::class, "view"])->name('dashboard.order.show');
            Route::post('/delete', [App\Http\Controllers\InquiryController::class, "delete"])->name('dashboard.order.delete');
        });

        Route::prefix('/transactions')->group(function () {
            Route::get('/', [App\Http\Controllers\TransactionController::class, 'index'])->name('dashboard.transaction');
            Route::get('/view/{id}', [App\Http\Controllers\TransactionController::class, "view"])->name('dashboard.transaction.show');
            Route::post('/delete', [App\Http\Controllers\TransactionController::class, "delete"])->name('dashboard.transaction.delete');
        });

        Route::prefix('/posts')->group(function () {
            Route::get('/', [App\Http\Controllers\PostController::class, 'index'])->name('dashboard.post');
            Route::match(['get', 'post'], '/add', [App\Http\Controllers\PostController::class, "add"])->name('dashboard.post.add');
            Route::match(['get', 'post'], '/edit/{id?}', [App\Http\Controllers\PostController::class, "edit"])->name('dashboard.post.edit');
            Route::post('/delete', [App\Http\Controllers\PostController::class, "delete"])->name('dashboard.post.delete');

            Route::prefix('/categories')->group(function () {
                Route::get('/', [App\Http\Controllers\PostCategoryController::class, 'index'])->name('dashboard.category');
                Route::match(['get', 'post'], '/add', [App\Http\Controllers\PostCategoryController::class, "add"])->name('dashboard.category.add');
                Route::post('/delete', [App\Http\Controllers\PostCategoryController::class, "delete"])->name('dashboard.category.delete');
            });
        });
    })->middleware('admin');

});
