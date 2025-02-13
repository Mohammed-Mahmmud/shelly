<?php

use App\Http\Controllers\Dashboard\ProductCategoryController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\PageController;
use App\Http\Controllers\Dashboard\ProductController;
use App\Http\Controllers\Dashboard\ProductUsingController;
use App\Http\Controllers\Dashboard\ProductTechnologyController;
use App\Http\Controllers\Dashboard\ProductTypeController;
use App\Http\Controllers\Dashboard\ProjectController;
use App\Http\Controllers\Dashboard\SolutionController;
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
            //   products
            Route::resource('Users', UserController::class)->names('users');
            Route::resource('Products', ProductController::class)->names('products');
            Route::group(['prefix' => 'Product', 'as' => 'product.'], function () {
                Route::resource('Categories', ProductCategoryController::class)->names('categories');
                Route::resource('Types', ProductTypeController::class)->names('types');
                Route::resource('Technologies', ProductTechnologyController::class)->names('technologies');
                Route::resource('Using', ProductUsingController::class)->names('using');
            });
            Route::resource('Pages', PageController::class)->names('pages');
            Route::resource('Solutions', SolutionController::class)->names('solutions');
            Route::resource('Projects', ProjectController::class)->names('projects');
        });
    }
);
