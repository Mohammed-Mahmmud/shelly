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
Route::group(['as' => 'api.'], function () {
    Route::get('products/{id?}', [FrontController::class, 'products'])->name('products');
    Route::get('solutions/{page}', [FrontController::class, 'solutions'])->name('solutions');
    Route::get('projects/{id}/', [FrontController::class, 'projects'])->name('projects');
    Route::get('project/{id}/', [FrontController::class, 'project'])->name('project');
    Route::get('navbar/{slug?}', [FrontController::class, 'navbar']);
    // Route::get('pages/{id?}', [FrontController::class, 'pages'])->name('pages');
    Route::get('producs-filter', [FrontController::class, 'productsFilter']);
});
