<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\PaketController;
use App\Http\Controllers\ModulController;
use App\Http\Controllers\Admin\ModulController as AdminModulController;
use App\Http\Controllers\Admin\VideoController as AdminVideoController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\MateriController;

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/', function () {
    return view('landing.index');
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/checkout/form', [CheckoutController::class, 'form'])->name('checkout.form');
    Route::post('/bayar', [CheckoutController::class, 'bayar'])->name('checkout.bayar');
});

// Media Pembelajaran untuk user yang sudah bayar
Route::middleware(['auth', 'sudah.bayar'])->group(function () {
    Route::get('/materi', [MateriController::class, 'index'])->name('materi.index');
    Route::get('/modul/{jenjang}', [ModulController::class, 'index']);
    Route::get('/video/{jenjang}', [VideoController::class, 'showByJenjang'])->name('video.jenjang');
});

// Admin routes
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    Route::resource('paket', PaketController::class)->except(['show']);
    Route::resource('modul', AdminModulController::class);
    Route::resource('video', AdminVideoController::class);

    Route::get('/verifikasi-transaksi', [\App\Http\Controllers\VerifikasiTransaksiController::class, 'index'])->name('verifikasi');
    Route::post('/verifikasi-transaksi/{id}/verifikasi', [\App\Http\Controllers\VerifikasiTransaksiController::class, 'verifikasi'])->name('verifikasi.aksi');
});

Route::get('/paket/paket-offline', [PaketController::class, 'showOffline']);
Route::get('/paket/paket-online', [PaketController::class, 'showOnline']);

Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::resource('paket', PaketController::class);
});
