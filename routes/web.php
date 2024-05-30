<?php

use App\Http\Controllers\Admin\ArtikelController;
use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['register' => false]);

Route::get('dashboard', [DashboardController::class, 'index'])->middleware('auth')->name('dashboard');

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::resource('artikel', ArtikelController::class);
});


// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
