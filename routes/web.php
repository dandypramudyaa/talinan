<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Application\Web\User\UserHomeController;
use App\Http\Controllers\Application\Web\Admin\ProfileController;

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
Route::get('/lapor-banjir',  [UserHomeController::class, 'laporBanjir'])->name('user.lapor-banjir');
Route::get('/donasi',  [UserHomeController::class, 'donasi'])->name('user.donasi');
Route::get('/artikel',  [UserHomeController::class, 'article'])->name('user.artikel');

// Route::get('/', function () {
//     return view('home');
// });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware();

Route::name('petugas.')->prefix('petugas')->group(function () {
    require_once __DIR__.'/web/petugas.php';
});

Route::name('admins.')->prefix('admin')->group(function () {

    require_once __DIR__.'/web/admin.php';

    Route::get('profile', [ProfileController::class,'index'])->name('profile');
    Route::post('profile/update', [ProfileController::class,'update'])->name('profile.update');
});
