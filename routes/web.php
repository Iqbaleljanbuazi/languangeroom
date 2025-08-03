<?php

use App\Http\Controllers\Admin\ModulController as AdminModulController;
use App\Http\Controllers\Admin\VideoController as AdminVideoController;
use App\Http\Controllers\Admin\QuizController as AdminQuizController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\MateriController;
use App\Http\Controllers\ModulController;
use App\Http\Controllers\PaketController;
use App\Http\Controllers\VerifikasiTransaksiController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\QuizController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('landing.index');
});

Route::get('/dashboard', function () {
    if (auth()->user()->role === 'admin') {
        return view('admin.dashboard');
    } else {
        return view('dashboard');
    }
})->middleware(['auth', 'verified'])->name('dashboard');


// Auth routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


// Paket routes
Route::get('/paket-online', [PaketController::class, 'online'])->name('paket.online');
Route::get('/paket-offline', [PaketController::class, 'offline'])->name('paket.offline');


// --- GRUP UNTUK PENGGUNA YANG SUDAH LOGIN ---
Route::middleware(['auth'])->group(function () {
    // Checkout
    Route::get('/checkout/{id}', [CheckoutController::class, 'form'])->name('checkout.form');
    Route::post('/checkout', [CheckoutController::class, 'process'])->name('checkout.process');
    Route::get('/payment/{id}', [CheckoutController::class, 'payment'])->name('checkout.payment');

    // Halaman Materi Utama
    Route::get('/materi', [MateriController::class, 'index'])->name('materi.index');

    // Halaman Detail Materi (dilindungi middleware 'sudah.bayar')
    Route::get('/modul/{paket}', [ModulController::class, 'index'])->name('modul.index')->middleware('sudah.bayar');
    Route::get('/video/{paket}', [VideoController::class, 'index'])->name('video.index')->middleware('sudah.bayar');
    Route::get('/quiz/{paket}', [QuizController::class, 'index'])->name('quiz.list')->middleware('sudah.bayar'); // <-- Diubah di sini
});


// --- GRUP KHUSUS UNTUK ADMIN ---
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    // Admin Paket
    Route::get('/admin/paket', [PaketController::class, 'index'])->name('admin.paket.index');
    // ... (route paket lainnya)

    // Admin Verifikasi
    Route::get('/admin/verifikasi', [VerifikasiTransaksiController::class, 'index'])->name('admin.verifikasi');
    Route::post('/admin/verifikasi/{id}', [VerifikasiTransaksiController::class, 'verify'])->name('admin.verifikasi.verify');

    // Admin Modul
    Route::resource('admin/modul', AdminModulController::class)->names([
        'index' => 'admin.modul.index',
        'create' => 'admin.modul.create',
        'store' => 'admin.modul.store',
        'edit' => 'admin.modul.edit',
        'update' => 'admin.modul.update',
        'destroy' => 'admin.modul.destroy',
    ]);

    // Admin Video
    Route::resource('admin/video', AdminVideoController::class)->names([
        'index' => 'admin.video.index',
        'create' => 'admin.video.create',
        'store' => 'admin.video.store',
        'edit' => 'admin.video.edit',
        'update' => 'admin.video.update',
        'destroy' => 'admin.video.destroy',
    ]);

    // Admin Kuis (CRUD untuk admin)
    Route::resource('quiz', AdminQuizController::class)->except(['show']);
});
