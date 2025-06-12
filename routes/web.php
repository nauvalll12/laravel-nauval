<?php

use App\Http\Controllers\SiswaController;
use Illuminate\Support\Facades\Route;
use App\Models\Siswa;

// Dashboard route
Route::get('dashboard', function () {
    return view('dashboard');
})->name('dashboard');

// Siswa resource routes
Route::resource('siswa', SiswaController::class);
