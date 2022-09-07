<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Application\Web\Petugas\DashboardController;
use App\Http\Controllers\Application\Web\Petugas\LaporanBanjirController;
use App\Http\Controllers\Application\Web\Petugas\DonasiBantuanBanjirController;
use App\Http\Controllers\Application\Web\Petugas\DataWargaController;

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
    Route::get('{id}/konfirmasi',[LaporanBanjirController::class,'konfirmasi'])->name('konfirmasi');
    Route::post('{id}/update', [LaporanBanjirController::class,'update'])->name('update');
    Route::get('{id}/delete', [LaporanBanjirController::class,'destroy'])->name('delete');
});

Route::name('donasi-bantuan-banjir.')->prefix('donasi-bantuan-banjir')->group(function () {
    Route::get('/', [DonasiBantuanBanjirController::class,'index'])->name('index');
    Route::get('create',[DonasiBantuanBanjirController::class,'create'])->name('create');
    Route::post('store', [DonasiBantuanBanjirController::class,'store'])->name('store');
    Route::get('{id}/show',[DonasiBantuanBanjirController::class,'edit'])->name('show');
    Route::get('{id}/cetak',[DonasiBantuanBanjirController::class,'cetakPdf'])->name('cetak-pdf');
    Route::post('{id}/update', [DonasiBantuanBanjirController::class,'update'])->name('update');
    Route::get('{id}/delete', [DonasiBantuanBanjirController::class,'destroy'])->name('delete');
});

Route::name('data-warga.')->prefix('data-warga')->group(function () {
    Route::get('/', [DataWargaController::class,'index'])->name('index');
    Route::get('create',[DataWargaController::class,'create'])->name('create');
    Route::post('store', [DataWargaController::class,'store'])->name('store');
    Route::get('{id}/show',[DataWargaController::class,'edit'])->name('show');
    Route::post('{id}/update', [DataWargaController::class,'update'])->name('update');
    Route::get('{id}/delete', [DataWargaController::class,'destroy'])->name('delete');
});