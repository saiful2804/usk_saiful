<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PesertaController;
use App\Http\Controllers\SkemaController;
use App\Http\Controllers\FrontendController;


// ==========================
// FRONTEND
// ==========================

Route::get('/', [FrontendController::class, 'index'])
    ->name('frontend');


// ==========================
// LOGIN ADMIN
// ==========================

Route::get('/login', [AuthController::class, 'showLogin'])
    ->name('login');

Route::post('/login', [AuthController::class, 'login'])
    ->name('login.process');

Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout');


// ==========================
// HALAMAN YANG HARUS LOGIN
// ==========================

Route::middleware('auth')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    Route::resource('peserta', PesertaController::class)
        ->parameters([
            'peserta' => 'peserta'
        ]);

    Route::resource('skema', SkemaController::class);

});