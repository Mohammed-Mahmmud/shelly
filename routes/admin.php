<?php

use App\Http\Controllers\Dashboard\DashboardController;
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
        });
    }
);
