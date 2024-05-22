<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\TernakController;
use App\Http\Controllers\WilayahController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

Route::get('/', [ClientController::class, 'index']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Wilayah
    Route::get('/admin/wilayah', [WilayahController::class, 'index'])->name('wilayah-index');
        // Create
    Route::get('/admin/tambah-wilayah', [WilayahController::class, 'create'])->name('wilayah-create');
    Route::post('/admin/tambah-wilayah', [WilayahController::class, 'store'])->name('wilayah-store');
        // Edit
    Route::get('/admin/edit-wilayah/{id}', [WilayahController::class, 'edit'])->name('wilayah-edit');
    Route::put('/admin/edit-wilayah/{id}', [WilayahController::class, 'update'])->name('wilayah-update');
        // Others
    Route::delete('/admin/wilayah/{wilayah}', [WilayahController::class, 'destroy'])->name('wilayah-destroy');

    // Ternak
    Route::get('/admin/peternakan', [TernakController::class, 'index'])->name('ternak-index');
        // Create
    Route::get('/admin/tambah-peternakan', [TernakController::class, 'create'])->name('ternak-create');
    Route::post('/admin/tambah-peternakan', [TernakController::class, 'store'])->name('ternak-store');
        // Edit
    Route::get('/admin/edit-peternakan/{id}', [TernakController::class, 'edit'])->name('ternak-edit');
    Route::put('/admin/edit-peternakan/{id}', [TernakController::class, 'update'])->name('ternak-update');
        // Others 
    Route::post('/admin/peternakan/klusterisasi/{id}', [TernakController::class, 'clustering'])->name('ternak-cluster');
    Route::delete('/admin/peternakan/{peternakan}', [TernakController::class, 'destroy'])->name('ternak-destroy');

    // Kriteria
    Route::get('/admin/kriteria', [KriteriaController::class, 'index'])->name('kriteria-index');
    Route::delete('/admin/kriteria/{kriteria}', [KriteriaController::class, 'destroy'])->name('kriteria-destroy');
});
