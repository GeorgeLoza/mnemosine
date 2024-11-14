<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\MobileController;
use App\Http\Controllers\PantallaController;
use Illuminate\Support\Facades\Route;



Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']);

Route::middleware(['auth'])->group(function () {

    Route::get('/', function () {
        return view('welcome');
    });

    Route::get('/usuario', [PantallaController::class, 'usuario'])->name('usuario.index');
    Route::get('/higienePersonal', [PantallaController::class, 'higienePersonal'])->name('higienePersonal.index');
    Route::get('/lavadoMano', [PantallaController::class, 'LavadoMano'])->name('lavadoMano.index');

    Route::get('/higiene', [MobileController::class, 'higienePersonal'])->name('mobile.higienePersonal');
    Route::get('/lavado', [MobileController::class, 'lavadoMano'])->name('mobile.lavadoMano');

    Route::post('/logout', [LoginController::class, 'cerrar'])->name('logout');


});
