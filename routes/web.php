<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Application\Web\User\UserHomeController;
use App\Http\Controllers\Application\Web\Admin\ProfileController;
use App\Http\Controllers\Auth\LoginController;

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

Route::get('/',  [UserHomeController::class, 'index'])->name('user.home');
// Route::get('/',  [LoginController::class, 'showLoginForm'])->name('login');
Route::get('/home',  [UserHomeController::class, 'index'])->name('home');
Route::get('/lapor-banjir',  [UserHomeController::class, 'laporBanjir'])->name('user.lapor-banjir');
Route::post('/store-lapor-banjir', [UserHomeController::class, 'storeLaporanBanjir'])->name('user.store-lapor-banjir');
Route::get('/donasi',  [UserHomeController::class, 'donasi'])->name('user.donasi');
Route::get('{id}/donasi',[UserHomeController::class,'donasiDetail'])->name('user.donasi-detail');
Route::post('{id}/store-donasi', [UserHomeController::class, 'storeDonasi'])->name('user.store-donasi');
Route::get('/artikel',  [UserHomeController::class, 'article'])->name('user.artikel');
Route::get('{id}/artikel',  [UserHomeController::class, 'detailArtikel'])->name('user.detail-artikel');

// Route::get('/', function () {
//     return view('home');
// });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware();

Route::name('petugas.')->prefix('rt-rw')->group(function () {
    require_once __DIR__.'/web/petugas.php';
});

Route::name('admins.')->prefix('kelurahan')->group(function () {

    require_once __DIR__.'/web/admin.php';

    Route::get('profile', [ProfileController::class,'index'])->name('profile');
    Route::post('profile/update', [ProfileController::class,'update'])->name('profile.update');
});
