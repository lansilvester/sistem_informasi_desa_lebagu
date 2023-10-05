<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PendudukController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\PengajuanKependudukanController;
use App\Http\Controllers\SuratKematianController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('landingpage');
});

Route::get('login', function(){
    return view('auth.login');
});
Route::post('login',[LoginController::class, 'login'])->name('login');

Route::middleware(['auth'])->group(function () {
    Route::get('dashboard',[DashboardController::class,'dashboard'] )->name('dashboard');
   
        Route::resource('penduduk', PendudukController::class);
        Route::get('penduduk/edit_password/{id}', [PendudukController::class, 'edit_password'])->name('penduduk.edit_password');
        Route::put('penduduk/update_password/{id}', [PendudukController::class, 'update_password'])->name('penduduk.update_password');
        Route::resource('pengajuan_penduduk', PengajuanKependudukanController::class);
        Route::put('/pengajuan_penduduk/check/{id}', [PengajuanKependudukanController::class, 'check'])->name('pengajuan_penduduk.check');
        Route::resource('surat_kematian', SuratKematianController::class);
        Route::resource('kegiatan', KegiatanController::class);
   
    Route::post('/logout', [LoginController::class,'logout'])->name('logout');
});