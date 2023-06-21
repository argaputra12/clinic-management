<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MedisController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\ResepObatController;

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

Route::prefix('/resep')->group(function (){
    Route::get('/show/{id}', [ResepObatController::class, 'show'])->name('resep.show');
});

Route::prefix('/medis')->group(function () {
    Route::get('/show/{id}', [MedisController::class, 'show'])->name('medis.show');
});

Route::prefix('/pasien')->group(function () {
    Route::get('/show/{id}', [PasienController::class, 'show'])->name('pasien.show');
});

Route::prefix('/medis')->group(function () {
   Route::get('/show/{id}', [MedisController::class, 'show'])->name('medis.show');
});

Route::prefix('/obat')->group(function () {
    Route::get('/show/{id}', [ObatController::class, 'show'])->name('obat.show');
});