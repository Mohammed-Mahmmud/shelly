<?php

use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\Lifting\ExaminationController;
use App\Http\Controllers\Dashboard\Lifting\MpiController;
use App\Http\Controllers\Dashboard\Lifting\ShakleSizeController;
use App\Http\Controllers\Dashboard\Tublar\MudJarController;
use App\Http\Controllers\Dashboard\Tublar\ToolsController;
use App\Http\Controllers\Dashboard\Tublar\TubsController;
use App\Http\Controllers\Dashboard\Tublar\TubsSummaryController;
use Illuminate\Support\Facades\Route;


Route::name('reports.')->prefix('Reports')->group(
    function () {
        Route::post('Delete-All', [DashboardController::class, 'deleteAll'])->name('deleteAll');
        Route::withoutMiddleware('auth')->group(function () {
            Route::post('Show', [DashboardController::class, 'show'])->name('show');
            Route::get('Download', [DashboardController::class, 'download'])->name('download');
            Route::get('Download-All', [DashboardController::class, 'downloadAll'])->name('downloadAll');
        });
        Route::post('Submit-Job', [DashboardController::class, 'submitAll'])->name('submitAll');
    }
);
// lifting reports 1)MPI
Route::name('mpi.')->prefix('MPI')->group(function () {
    Route::get('Repeat/{id}', [MpiController::class, 'repeat'])->name('reports.repeat');
    Route::resource('Reports', MpiController::class)->names('reports');
});

// Examination
Route::name('examination.')->prefix('Thorough-Examination')->group(function () {
    Route::get('Repeat/{id}', [ExaminationController::class, 'repeat'])->name('reports.repeat');
    Route::resource('Shakle-Size', ShakleSizeController::class)->names('shaklesize');
    Route::resource('Reports', ExaminationController::class)->names('reports');
});

//   mud jar
Route::name('mud-jar.')->prefix('Mud-Jar')->group(function () {
    Route::get('Repeat/{id}', [MudJarController::class, 'repeat'])->name('reports.repeat');
    Route::resource('Reports', MudJarController::class)->names('reports');
});

// tools (pin*pin || box*pin || box*box)
Route::name('tools.')->prefix('Tools')->group(function () {
    Route::get('Repeat/{id}', [ToolsController::class, 'repeat'])->name('reports.repeat');
    Route::resource('Reports', ToolsController::class)->names('reports');
});

//Tubs (heavy-weight + drill collar + Drill pipe)
Route::name('tubs.')->prefix('Tubs')->group(function () {
    Route::get('Repeat/{id}', [TubsController::class, 'repeat'])->name('reports.repeat');
    Route::resource('Reports', TubsController::class)->names('reports');
    //     summary reports
    Route::resource('Summary', TubsSummaryController::class)->names('summary');
});
