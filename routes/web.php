<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MedisController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ResepObatController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\Auth\CustomLoginController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})
->middleware(['dokter'])
->name('welcome');

Route::middleware(['admin'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::prefix('pasien')->group(function () {
        Route::get('/', [PasienController::class, 'index'])->name('pasien.index');
        Route::post('/', [PasienController::class, 'store'])->name('pasien.store');
        Route::get('/create', [PasienController::class, 'create'])->name('pasien.create');
        Route::put('/{id}', [PasienController::class, 'update'])->name('pasien.update');
        Route::get('/{id}', [PasienController::class, 'update'])->name('pasien.update');
        Route::delete('/{id}', [PasienController::class, 'destroy'])->name('pasien.destroy');
    });

    Route::prefix('medis')->group(function () {
        Route::get('/', [MedisController::class, 'index'])->name('medis.index');
        Route::post('/', [MedisController::class, 'store'])->name('medis.store');
        Route::get('/create', [MedisController::class, 'create'])->name('medis.create');
        Route::put('/{id}', [MedisController::class, 'update'])->name('medis.update');
        Route::get('/{id}', [MedisController::class, 'update'])->name('medis.update');
        Route::delete('/{id}', [MedisController::class, 'destroy'])->name('medis.destroy');
    });

    Route::prefix('user')->group(function (){
        Route::get('/', [UserController::class, 'index'])->name('user.index');
        Route::post('/', [UserController::class, 'store'])->name('user.store');
        Route::get('/create', [UserController::class, 'create'])->name('user.create');
        Route::put('/{id}', [UserController::class, 'update'])->name('user.update');
        Route::get('/{id}', [UserController::class, 'update'])->name('user.update');
        Route::delete('/{id}', [UserController::class, 'destroy'])->name('user.destroy');
    });

    Route::prefix('resep')->group(function (){
        Route::get('/', [ResepObatController::class, 'index'])->name('resep.index');
        Route::post('/', [ResepObatController::class, 'store'])->name('resep.store');
        Route::get('/create', [ResepObatController::class, 'create'])->name('resep.create');
        Route::put('/{id}', [ResepObatController::class, 'update'])->name('resep.update');
        Route::get('/{id}', [ResepObatController::class, 'update'])->name('resep.update');
        Route::delete('/{id}', [ResepObatController::class, 'destroy'])->name('resep.destroy');
    });

    Route::prefix('pembayaran')->group(function (){
        Route::get('/', [PembayaranController::class, 'index'])->name('pembayaran.index');
        Route::post('/', [PembayaranController::class, 'store'])->name('pembayaran.store');
        Route::get('/create', [PembayaranController::class, 'create'])->name('pembayaran.create');
        Route::put('/{id}', [PembayaranController::class, 'update'])->name('pembayaran.update');
        Route::get('/{id}', [PembayaranController::class, 'update'])->name('pembayaran.update');
        Route::delete('/{id}', [PembayaranController::class, 'destroy'])->name('pembayaran.destroy');
    });

});

Route::middleware('dokter')->group(function (){
    Route::prefix('/dokter')->group(function (){
        Route::get('/dashboard', function () {
            return view('dokter.dashboard');
        })->name('dokter.dashboard');

        Route::get('/medis', [MedisController::class, 'dokterIndex'])->name('dokter.medis.index');
    });
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// useless routes
// Just to demo sidebar dropdown links active states.
Route::get('/buttons/text', function () {
    return view('buttons-showcase.text');
})->middleware(['auth'])->name('buttons.text');

Route::get('/buttons/icon', function () {
    return view('buttons-showcase.icon');
})->middleware(['auth'])->name('buttons.icon');

Route::get('/buttons/text-icon', function () {
    return view('buttons-showcase.text-icon');
})->middleware(['auth'])->name('buttons.text-icon');

require __DIR__ . '/auth.php';