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
    Route::get('/documentacion', [PantallaController::class, 'documentacion'])->name('documentacion.index');
    Route::get('/externoPersonal', [PantallaController::class, 'externoPersonal'])->name('externoPersonal.index');
    Route::get('/ordLimDes', [PantallaController::class, 'ordLimDes'])->name('ordLimDes.index');
    Route::get('/verOrdLimDes', [PantallaController::class, 'verOrdLimDes'])->name('verOrdLimDes.index');
    Route::get('/orp', [PantallaController::class, 'orp'])->name('orp.index');
    Route::get('/orp/reporte/{id}', [PantallaController::class, 'reportOrp'])->name('orp.report');

    Route::get('/higiene', [MobileController::class, 'higienePersonal'])->name('mobile.higienePersonal');
    Route::get('/externo', [MobileController::class, 'higieneExterno'])->name('mobile.higieneExterno');
    Route::get('/lavado', [MobileController::class, 'lavadoMano'])->name('mobile.lavadoMano');
    Route::get('/verOLD', [MobileController::class, 'verOLD'])->name('mobile.verOLD');

    Route::post('/logout', [LoginController::class, 'cerrar'])->name('logout');


});
