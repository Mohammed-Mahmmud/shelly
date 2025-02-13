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

Route::get('products', [FrontController::class, 'allProducts']);
Route::get('products/{id}', [FrontController::class, 'singleProduct']);
Route::get('solutions/{category}', [FrontController::class, 'allSolutions']);
Route::get('projects/{slug}', [FrontController::class, 'singleProject']);
