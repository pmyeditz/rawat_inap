<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KamarController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\JadwalMedisController;
use App\Http\Controllers\TenagaMedisController;
use App\Http\Controllers\Auth\ForgotPasswordController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Ini adalah tempat mendefinisikan semua route web aplikasi.
|
*/

// Redirect ke halaman login
Route::get('/', fn() => redirect('/login'));

// Autentikasi Login
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

// Lupa Password
Route::get('/forgot-password', [ForgotPasswordController::class, 'showForgotForm'])->name('password.request');
Route::post('/send-otp', [ForgotPasswordController::class, 'sendOtp'])->name('password.sendotp');
Route::get('/verify-otp', [ForgotPasswordController::class, 'showOtpForm'])->name('password.otp');
Route::post('/verify-otp', [ForgotPasswordController::class, 'verifyOtp'])->name('password.verifyotp');
Route::post('/reset-password', [ForgotPasswordController::class, 'resetPassword'])->name('password.reset');

// Route yang hanya bisa diakses oleh admin atau medis
Route::middleware(['auth.admin.or.medis'])->group(function () {

    // Dashboard
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

    // Profile Pengguna
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');

    // Manajemen Tenaga Medis
    Route::resource('/medis', TenagaMedisController::class);

    // Jadwal Medis
    Route::resource('jadwal', JadwalMedisController::class);

    // Manajemen Kamar
    Route::resource('kamar', KamarController::class);

    // Manajemen Pasien
    Route::resource('pasien', PasienController::class);
});
