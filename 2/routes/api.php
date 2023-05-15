<?php

use App\Http\Controllers\ParkController;
use Illuminate\Support\Facades\Route;

Route::prefix('parks')->group(function () {
    // store
    Route::post('', [ParkController::class, 'store'])->name('park.store');
    // destroy
    Route::delete('{park}', [ParkController::class, 'destroy'])->name('park.destroy');
    // index & count
    Route::get('', [ParkController::class, 'index'])->name('park.index');
});

