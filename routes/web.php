<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SbpController;

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

route::view('dashboard','layouts.contents.dashboard');
route::view('dashboard-2','layouts.contents.dashboard2');

route::get('/surat-bukti-penindakan', [SbpController::class, 'index'])->name('sbp-list');
route::get('/surat-bukti-penindakan/sampah', [SbpController::class, 'trash'])->name('sbp.trash');
route::get('/surat-bukti-penindakan/buat', [SbpController::class, 'create'])->name('sbp-create');
route::post('/surat-bukti-penindakan/simpan',[SbpController::class, 'store'])->name('sbp.store');
route::get('/surat-bukti-penindakan/ubah/{id}',[SbpController::class, 'show'])->name('sbp.edit');
route::put('/surat-bukti-penindakan/ubah/{id}',[SbpController::class, 'update'])->name('sbp.update');
route::get('/surat-bukti-penindakan/hapus/{id}',[SbpController::class, 'destroy'])->name('sbp.destroy');
route::get('/surat-bukti-penindakan/hapus-permanen/{id}',[SbpController::class, 'destroyPermanen'])->name('sbp.destroy.permanen');
route::get('/surat-bukti-penindakan/restore/{id}',[SbpController::class, 'restore'])->name('sbp.restore');
