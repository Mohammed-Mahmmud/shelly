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

Route::get('products/{id?}', [FrontController::class, 'products']);
Route::get('solutions/{category}', [FrontController::class, 'solutions']);
Route::get('projects/{slug}', [FrontController::class, 'projects']);
Route::get('pages/{slug?}', [FrontController::class, 'pages']);
Route::get('producs-filter', [FrontController::class, 'productSFilter']);
