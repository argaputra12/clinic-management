<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MedisController;
use App\Http\Controllers\PasienController;

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

Route::prefix('pasien')->group(function () {
    Route::get('/{id}', [PasienController::class, 'show'])->name('pasien.show');
    Route::get('/{id}/edit', [PasienController::class, 'getEdit'])->name('pasien.edit');
});

Route::prefix('medis')->group(function (){
    Route::get('/create', [MedisController::class, 'create'])->name('medis.create');
    Route::get('/{id}', [MedisController::class, 'show'])->name('medis.show');
    Route::get('/{id}/edit', [MedisController::class, 'edit'])->name('medis.edit');
});