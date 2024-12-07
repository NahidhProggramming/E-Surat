<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuratMasukController;
use App\Http\Controllers\SuratKeluarController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;

// Rute untuk menampilkan form login
Route::get('/', [LoginController::class, 'showLoginForm'])->name('login');
Route::get('/registrasi', function () {
    return view('auth/registrasi'); // atau tampilan utama Anda
});
// Rute untuk proses login
Route::post('/', [LoginController::class, 'login']);
// Rute untuk logout
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Semua rute di bawah ini dilindungi oleh middleware 'auth'
Route::middleware(['auth'])->group(function () {
    // Routes for all authenticated users
    Route::middleware(['RoleMiddleWare:operator'])->group(function () {
        // Rute untuk halaman dashboard
        Route::get('/dashboard', function () {
            return view('dashboard'); // atau tampilan utama Anda
        });

        // Rute untuk halaman download
        Route::get('/download', function () {
            return view('download');
        });

        // Rute untuk ekspor surat masuk
        Route::get('/surat-masuk/export', [SuratMasukController::class, 'export'])->name('suratmasuk.export');
        // Rute untuk ekspor surat keluar
        Route::get('/surat-keluar/export', [SuratKeluarController::class, 'export'])->name('suratkeluar.export');
        // Rute untuk pencarian surat masuk
        Route::get('/search', [SuratMasukController::class, 'search'])->name('search');
        // Rute untuk pencarian surat keluar
        Route::get('/searchsk', [SuratKeluarController::class, 'search'])->name('searchsk');

        // Rute untuk surat masuk
        Route::get('/surat-masuk', [SuratMasukController::class, 'view'])->name('posts.suratmasuk');
        Route::get('/tambah-surat-masuk', [SuratMasukController::class, 'add'])->name('posts.tambahsm');
        Route::post('/surat-masuk/create', [SuratMasukController::class, 'submit'])->name('posts.submit');

        // Rute untuk mengedit surat masuk
        Route::get('/surat-masuk-edit{id}', [SuratMasukController::class, 'edit'])->name('posts.editsm');
        Route::put('/surat-masuk{id}', [SuratMasukController::class, 'update'])->name('posts.update');

        // Rute untuk menghapus surat masuk
        Route::delete('/suratmasuk/{id}', [SuratMasukController::class, 'destroy'])->name('posts.destroy');

        // Rute untuk surat keluar
        Route::get('/surat-keluar', [SuratKeluarController::class, 'view'])->name('posts.suratkeluar');
        Route::get('/tambah-surat-keluar', [SuratKeluarController::class, 'add'])->name('posts.tambahsk');
        Route::post('/create', [SuratKeluarController::class, 'submit'])->name('posts.submitsk');

        // Rute untuk mengedit surat keluar
        Route::get('/surat-keluar-edit{id}', [SuratKeluarController::class, 'edit'])->name('posts.editsk');
        Route::put('/update{id}', [SuratKeluarController::class, 'update'])->name('posts.update');

        // Rute untuk menghapus surat keluar
        Route::delete('/suratkeluar/{id}', [SuratKeluarController::class, 'destroy'])->name('posts.destroysk');
    });
});
