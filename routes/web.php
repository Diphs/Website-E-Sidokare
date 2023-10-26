<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\ppidController;
use App\Http\Controllers\beritaController;
use Illuminate\Support\Facades\Password;
use App\Http\Controllers\AkunController;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\keluhanController;
use App\Http\Controllers\AkunsController;
use App\Http\Controllers\aspirasiController;
use App\Http\Controllers\pengajuanppidController;
use App\Http\Controllers\pengajuankeluhanController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [dashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    // Place your authenticated routes here
    Route::get('/berita', 'BeritaController@index')->name('berita.index');
    Route::get('/berita/create', 'BeritaController@create')->name('berita.create');
    // Add other authenticated routes here
});
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

Route::get('/forgot-password', function () {
    return view('auth.forgot-password');
})->middleware('guest')->name('password.request');

Route::post('/forgot-password', function (Request $request) {
    $status = Password::sendResetLink(
        $request->only('email')
    );
    return $status === Password::RESET_LINK_SENT
        ? back()->with(['status' => __($status)])
        : back()->withErrors(['email' => __($status)]);
})->middleware('guest')->name('password.email');

Route::get('/reset-password/{token}', function ($token) {
    return view('auth.reset-password', ['token' => $token]);
})->middleware('guest')->name('password.reset');
Route::get('/formpengajuan', function () {
    return view('formpengajuan');
});
Route::get('/berita', function () {
    return view('berita');
});

Route::get('/berita', [BeritaController::class, 'index'])->middleware(['auth', 'verified'])->name('berita.index');
Route::get('/berita/create', [BeritaController::class, 'create'])->middleware(['auth', 'verified'])->name('berita.create');
Route::post('/berita', [BeritaController::class, 'store'])->middleware(['auth', 'verified'])->name('berita.store');
Route::get('/berita/{berita}', [BeritaController::class, 'show'])->middleware(['auth', 'verified'])->name('berita.show');
Route::get('/berita/{berita}/edit', [BeritaController::class, 'edit'])->middleware(['auth', 'verified'])->name('berita.edit');
Route::put('/berita/{berita}', [BeritaController::class, 'update'])->middleware(['auth', 'verified'])->name('berita.update');
Route::delete('/berita/{berita}', [BeritaController::class, 'destroy'])->middleware(['auth', 'verified'])->name('berita.destroy');

Route::resource('users', AkunController::class);

Route::post('/kirim-email', [EmailController::class, 'kirimEmail']);

Route::resource('akun', AkunsController::class);

Route::get('/aspirasi', [AspirasiController::class, 'index'])->middleware(['auth', 'verified'])->name('aspirasi.index');
Route::get('/aspirasi/{id}/edit', [AspirasiController::class, 'edit'])->middleware(['auth', 'verified'])->name('aspirasi.edit');
Route::put('/aspirasi/{id}', [AspirasiController::class, 'update'])->middleware(['auth', 'verified'])->name('aspirasi.update');
Route::delete('/aspirasi/{id}', [AspirasiController::class, 'destroy'])->middleware(['auth', 'verified'])->name('aspirasi.destroy');
Route::get('/aspirasi/{id}/keberatan', [AspirasiController::class, 'keberatan'])->middleware(['auth', 'verified'])->name('aspirasi.keberatan');

Route::get('/formpengajuan', [pengajuanppidController::class, 'index'])->middleware(['auth', 'verified'])->name('ppid.index');
Route::get('/ppid/{id}/edit', [pengajuanppidController::class, 'edit'])->middleware(['auth', 'verified'])->name('ppid.edit');
Route::put('/ppid/{id}', [pengajuanppidController::class, 'update'])->middleware(['auth', 'verified'])->name('ppid.update');
Route::delete('/ppid/{id}', [pengajuanppidController::class, 'destroy'])->middleware(['auth', 'verified'])->name('ppid.destroy');
Route::get('/ppid/{id}/keberatan', [pengajuanppidController::class, 'keberatan'])->middleware(['auth', 'verified'])->name('ppid.keberatan');

Route::get('/keluhan', [pengajuankeluhanController::class, 'index'])->middleware(['auth', 'verified'])->name('keluhan.index');
Route::get('/keluhan/{id}/edit', [pengajuankeluhanController::class, 'edit'])->middleware(['auth', 'verified'])->name('keluhan.edit');
Route::put('/keluhan/{id}', [pengajuankeluhanController::class, 'update'])->middleware(['auth', 'verified'])->name('keluhan.update');
Route::delete('/keluhan/{id}', [pengajuankeluhanController::class, 'destroy'])->middleware(['auth', 'verified'])->name('keluhan.destroy');
Route::get('/keluhan/{id}/keberatan', [pengajuankeluhanController::class, 'keberatan'])->middleware(['auth', 'verified'])->name('keluhan.keberatan');