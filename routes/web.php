<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MedisController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\CustomLoginController;
use App\Http\Controllers\ResepObatController;

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
    })->name('dashboard');https://www.thunderclient.com/welcome

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

    Route::prefix('resep-obat')->group(function (){
        Route::get('/', [ResepObatController::class, 'index'])->name('resep.index');
        Route::post('/', [ResepObatController::class, 'store'])->name('resep.store');
        Route::put('/{id}', [ResepObatController::class, 'update'])->name('resep.update');
        Route::get('/{id}', [ResepObatController::class, 'update'])->name('resep.update');
        Route::delete('/{id}', [ResepObatController::class, 'destroy'])->name('resep.destroy');
    });

});

Route::get('/dashboard', function () {
    return view('dashboard');
})
->middleware(['admin'])
->name('dashboard');

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
