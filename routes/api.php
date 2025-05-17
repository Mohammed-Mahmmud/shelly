<?php

use App\Http\Controllers\Api\FrontController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::controller(FrontController::class)->name('api.')->group(function () {
    Route::get('products/{id?}', 'products')->name('products');
    Route::get('solutions/{page}', 'solutions')->name('solutions');
    Route::get('projects/{id?}', 'projects')->name('projects');
    Route::get('project/{id}/', 'project')->name('project');
    Route::get('navbar/{slug?}', 'navbar');
    Route::get('producs-filter', 'productsFilter')->name('productsFilter');
    Route::get('page/home', 'getHomePage')->name('home');
});
