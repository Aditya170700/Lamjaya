<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProvinsiController;
use App\Http\Controllers\KecamatanController;
use App\Http\Controllers\KelurahanController;
use App\Http\Controllers\PegawaiController;

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

Route::get('/provinces', [ProvinsiController::class, 'index'])->name('provinsi');
Route::post('/provinces', [ProvinsiController::class, 'store'])->name('provinsi.store');
Route::put('/provinces/{id}', [ProvinsiController::class, 'update'])->name('provinsi.update');
Route::delete('/provinces/{id}', [ProvinsiController::class, 'destroy'])->name('provinsi.destroy');

Route::get('/kecamatan', [KecamatanController::class, 'index'])->name('kecamatan');
Route::post('/kecamatan', [KecamatanController::class, 'store'])->name('kecamatan.store');
Route::put('/kecamatan/{id}', [KecamatanController::class, 'update'])->name('kecamatan.update');
Route::delete('/kecamatan/{id}', [KecamatanController::class, 'destroy'])->name('kecamatan.destroy');

Route::get('/kelurahan', [KelurahanController::class, 'index'])->name('kelurahan');
Route::post('/kelurahan', [KelurahanController::class, 'store'])->name('kelurahan.store');
Route::put('/kelurahan/{id}', [KelurahanController::class, 'update'])->name('kelurahan.update');
Route::delete('/kelurahan/{id}', [KelurahanController::class, 'destroy'])->name('kelurahan.destroy');

Route::get('/pegawai', [PegawaiController::class, 'index'])->name('pegawai');
Route::post('/pegawai', [PegawaiController::class, 'store'])->name('pegawai.store');
Route::put('/pegawai/{id}', [PegawaiController::class, 'update'])->name('pegawai.update');
Route::delete('/pegawai/{id}', [PegawaiController::class, 'destroy'])->name('pegawai.destroy');
