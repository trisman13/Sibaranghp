<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{SbpController,
                            BarangController,
                            SatuanController};

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web Routes for your application. These
| Routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::view('dashboard','layouts.contents.dashboard');
Route::view('dashboard-2','layouts.contents.dashboard2');

Route::get('/surat-bukti-penindakan', [SbpController::class, 'index'])->name('sbp-list');
Route::get('/surat-bukti-penindakan/sampah', [SbpController::class, 'trash'])->name('sbp.trash');
Route::get('/surat-bukti-penindakan/buat', [SbpController::class, 'create'])->name('sbp-create');
Route::post('/surat-bukti-penindakan/simpan', [SbpController::class, 'store'])->name('sbp.store');
Route::get('/surat-bukti-penindakan/ubah/{id}', [SbpController::class, 'show'])->name('sbp.edit');
Route::put('/surat-bukti-penindakan/ubah/{id}', [SbpController::class, 'update'])->name('sbp.update');
Route::get('/surat-bukti-penindakan/hapus/{id}', [SbpController::class, 'destroy'])->name('sbp.destroy');
Route::get('/surat-bukti-penindakan/hapus-permanen/{id}', [SbpController::class, 'destroyPermanen'])->name('sbp.destroy.permanen');
Route::get('/surat-bukti-penindakan/restore/{id}',[SbpController::class, 'restore'])->name('sbp.restore');

Route::get('/barang', [BarangController::class, 'index'])->name('barang.list');
Route::get('/barang/sampah', [BarangController::class, 'trash'])->name('barang.trash');
Route::put('/barang/ubah/{id}', [BarangController::class, 'update'])->name('barang.update');
Route::get('/barang/hapus/{id}', [BarangController::class, 'destroy'])->name('barang.destroy');
Route::get('/barang/hapus-permanen/{id}', [BarangController::class, 'destroyPermanent'])->name('barang.destroy.permanent');
Route::get('/barang/restore/{id}', [BarangController::class, 'restore'])->name('barang.restore');

Route::get('/satuan', [SatuanController::class, 'index'])->name('satuan.list');
Route::get('/satuan/buat', [SatuanController::class, 'create'])->name('satuan.create');
Route::post('/satuan/simpan', [SatuanController::class, 'store'])->name('satuan.store');
Route::get('/satuan/ubah/{id}', [SatuanController::class, 'show'])->name('satuan.edit');
Route::put('/satuan/ubah/{id}', [SatuanController::class, 'update'])->name('satuan.update');
Route::get('/satuan/hapus/{id}', [SatuanController::class, 'destroy'])->name('satuan.destroy');