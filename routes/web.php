<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\AntrianController;
use App\Http\Controllers\Admin\VideoController;
use App\Http\Controllers\Admin\KeteranganController;
use App\Http\Controllers\Admin\PoliKlinikController;
use App\Http\Controllers\FrontController;
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
});

Route::get('front', [FrontController::class, 'index']);


Route::group(['middleware' => 'guest'], function() {
    Route::get('login', [AuthController::class, 'login'])->name('login');
    Route::post('login', [AuthController::class, 'auths']);

    Route::get('registrasi', [AuthController::class, 'register'])->name('registrasi');
    Route::post('registrasi', [AuthController::class, 'store']);
});

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('loket-1', [AntrianController::class, 'loket_1'])->name('loket_1');
    Route::get('loket-2', [AntrianController::class, 'loket_2'])->name('loket_2');
    Route::get('loket-3', [AntrianController::class, 'loket_3'])->name('loket_3');
    Route::get('video', [VideoController::class, 'video'])->name('video');
    Route::get('keterangan', [KeteranganController::class, 'keterangan'])->name('keterangan');
    Route::get('poliklinik', [PoliKlinikController::class, 'poliklinik'])->name('poliklinik');
});