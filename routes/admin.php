<?php

use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\ProductController;
use App\Http\Controllers\Dashboard\ProductUsingController;
use App\Http\Controllers\Dashboard\TechnologyController;
use App\Http\Controllers\Dashboard\TypeController;
use App\Http\Controllers\Dashboard\UserController;
use Illuminate\Support\Facades\Route;











/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
 */

Route::group(
    [
        'prefix' => env("PANEL"),
    ],
    function () {

        require __DIR__ . '/auth.php';
        Route::redirect("register", "login"); //Dashboard Routes
        Route::name('admin.')->middleware('auth')->group(function () {

            Route::resource('/', DashboardController::class)->names('mainDashboard');
            //   users
            Route::resource('Users', UserController::class)->names('users');
            Route::resource('Products', ProductController::class)->names('products');
            Route::resource('Product/Categories', CategoryController::class)->names('categories');
            Route::resource('Product/Types', TypeController::class)->names('types');
            Route::resource('Product/Technologies', TechnologyController::class)->names('technologies');
            Route::resource('Product/Using', ProductUsingController::class)->names('product-using');
        });
    }
);
