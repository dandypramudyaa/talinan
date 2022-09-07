<?php

use App\Http\Controllers\Application\Web\Admin\CategoryController;
use App\Http\Controllers\Application\Web\Admin\DashboardController;
use App\Http\Controllers\Application\Web\Admin\LaporanBanjirController;
use App\Http\Controllers\Application\Web\Admin\DonasiBantuanBanjirController;
use App\Http\Controllers\Application\Web\Admin\ArtikelController;
use App\Http\Controllers\Application\Web\Admin\PetugasController;
use App\Http\Controllers\Application\Web\Admin\UserController;
use App\Http\Controllers\Application\Web\Admin\DataWargaController;
use Illuminate\Support\Facades\Route;

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

Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::name('laporan-banjir.')->prefix('laporan-banjir')->group(function () {
    Route::get('/', [LaporanBanjirController::class,'index'])->name('index');
    Route::get('create',[LaporanBanjirController::class,'create'])->name('create');
    Route::post('store', [LaporanBanjirController::class,'store'])->name('store');
    Route::get('{id}/show',[LaporanBanjirController::class,'edit'])->name('show');
    Route::post('{id}/update', [LaporanBanjirController::class,'update'])->name('update');
    Route::get('{id}/delete', [LaporanBanjirController::class,'destroy'])->name('delete');
});

Route::name('donasi-bantuan-banjir.')->prefix('bantuan-dana')->group(function () {
    Route::get('/', [DonasiBantuanBanjirController::class,'index'])->name('index');
    Route::get('create',[DonasiBantuanBanjirController::class,'create'])->name('create');
    Route::post('store', [DonasiBantuanBanjirController::class,'store'])->name('store');
    Route::get('{id}/cetak',[DonasiBantuanBanjirController::class,'cetakPdf'])->name('cetak-pdf');
    Route::get('{id}/show',[DonasiBantuanBanjirController::class,'edit'])->name('show');
    Route::post('{id}/update', [DonasiBantuanBanjirController::class,'update'])->name('update');
    Route::get('{id}/delete', [DonasiBantuanBanjirController::class,'destroy'])->name('delete');
});

Route::name('artikel.')->prefix('artikel')->group(function () {
    Route::get('/', [ArtikelController::class,'index'])->name('index');
    Route::get('create',[ArtikelController::class,'create'])->name('create');
    Route::post('store', [ArtikelController::class,'store'])->name('store');
    Route::get('{id}/show',[ArtikelController::class,'edit'])->name('show');
    Route::post('{id}/update', [ArtikelController::class,'update'])->name('update');
    Route::get('{id}/delete', [ArtikelController::class,'destroy'])->name('delete');
});

Route::name('petugas.')->prefix('rt-rw')->group(function () {
    Route::get('/', [PetugasController::class,'index'])->name('index');
    Route::get('create',[PetugasController::class,'create'])->name('create');
    Route::post('store', [PetugasController::class,'store'])->name('store');
    Route::get('{id}/show',[PetugasController::class,'edit'])->name('show');
    Route::post('{id}/update', [PetugasController::class,'update'])->name('update');
    Route::get('{id}/delete', [PetugasController::class,'destroy'])->name('delete');
});

Route::name('users.')->prefix('users')->group(function () {
    Route::get('/', [UserController::class,'index'])->name('index');
    Route::get('create',[UserController::class,'create'])->name('create');
    Route::post('store', [UserController::class,'store'])->name('store');
    Route::get('{id}/show',[UserController::class,'edit'])->name('show');
    Route::post('{id}/update', [UserController::class,'update'])->name('update');
    Route::get('{id}/delete', [UserController::class,'destroy'])->name('delete');
});

Route::name('data-warga.')->prefix('data-warga')->group(function () {
    Route::get('/', [DataWargaController::class,'index'])->name('index');
    Route::get('create',[DataWargaController::class,'create'])->name('create');
    Route::post('store', [DataWargaController::class,'store'])->name('store');
    Route::post('import', [DataWargaController::class,'import'])->name('import');
    Route::get('{id}/show',[DataWargaController::class,'edit'])->name('show');
    Route::post('{id}/update', [DataWargaController::class,'update'])->name('update');
    Route::get('{id}/delete', [DataWargaController::class,'destroy'])->name('delete');
});