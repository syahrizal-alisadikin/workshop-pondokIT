<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\ProfileController;
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
    return view('welcome');
});



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::prefix('admin')
    ->middleware('auth')
    ->group(function () {
        Route::get('/dashboard', function () {
            return view('admin');
        })->middleware(['auth', 'verified'])->name('dashboard');

        // category
        Route::resource('category', CategoryController::class);

        // product
        Route::resource('product', ProductController::class);

        // order
        Route::resource('order', OrderController::class);

        // user
        Route::resource('user', UserController::class);

        Route::middleware('auth')->group(function () {
            Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
            Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
            Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
        });
    });

// user
// Route::prefix('user')
//     ->middleware('auth')
//     ->group(function () {
//         // url user
//     });



require __DIR__ . '/auth.php';
