<?php

use App\Http\Controllers\DocumentacionController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MobileController;
use App\Http\Controllers\PantallaController;
use Illuminate\Support\Facades\Route;
use App\Livewire\Documentacion\PdfViewer;
use App\Http\Controllers\PdfController;




Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']);

Route::middleware(['auth'])->group(function () {

    Route::get('/', function () {
        return view('welcome');
    });

    Route::get('/usuario', [PantallaController::class, 'usuario'])->name('usuario.index');
    Route::get('/higienePersonal', [PantallaController::class, 'higienePersonal'])->name('higienePersonal.index');
    Route::get('/ReporteHigienePersonal', [PantallaController::class, 'ReporteHigienePersonal'])->name('ReporteHigienePersonal.index');
    Route::get('/Reporte2HigienePersonal', [PantallaController::class, 'Reporte2HigienePersonal'])->name('Reporte2HigienePersonal.index');
    Route::get('/lavadoMano', [PantallaController::class, 'LavadoMano'])->name('lavadoMano.index');
    Route::get('/ReporteLavadoMano', [PantallaController::class, 'ReporteLavadoMano'])->name('ReporteLavadoMano.index');
    Route::get('/curacion', [PantallaController::class, 'curacion'])->name('curacion.index');
    Route::get('/sustancias', [PantallaController::class, 'sustancias'])->name('sustancias.index');
    Route::get('/evacuacion', [PantallaController::class, 'evacuacion'])->name('evacuacion.index');
    Route::get('/evacuacionReporte', [PantallaController::class, 'reporteEvacuacion'])->name('evacuacionReporte.index');
    Route::get('/documentacion', [PantallaController::class, 'documentacion'])->name('documentacion.index');
    // routes/web.php
    Route::get('/documentacion/{id}', [PantallaController::class, 'documentacionVer'])
        ->name('documentacion.ver');


    Route::get('/ver-pdf/{documento}', [PdfViewer::class, 'verPDF'])->name('ver.pdf');

    Route::get('/ver-pdf/{id}', [PdfController::class, 'verPDF'])->name('ver.pdf');




    Route::get('/documentacion/{documento}/ver-pdf', [PdfViewer::class, 'verPDF'])
        ->name('documentacion.verPDF');

    Route::get('/externoPersonal', [PantallaController::class, 'externoPersonal'])->name('externoPersonal.index');
    Route::get('/ordLimDes', [PantallaController::class, 'ordLimDes'])->name('ordLimDes.index');
    Route::get('/verOrdLimDes', [PantallaController::class, 'verOrdLimDes'])->name('verOrdLimDes.index');
    Route::get('/ordLimDesReporte', [PantallaController::class, 'reporteOrdLimDes'])->name('ordLimDesReporte.index');
    Route::get('/orp', [PantallaController::class, 'orp'])->name('orp.index');
    Route::get('/orp/reporte/{id}', [PantallaController::class, 'reportOrp'])->name('orp.report');
    Route::get('/mantenimiento/maquina', [PantallaController::class, 'maquina'])->name('maquinas.index');
    Route::get('/mantenimiento/maquina/{id}', [PantallaController::class, 'maquinaDetalle'])->name('maquina.detalle');
    Route::get('/mantenimiento/revisionDiaria', [PantallaController::class, 'revisionDiaria'])->name('revisionDiaria.index');
    Route::get('/mantenimiento/OrdenTrabajo/{tipo}', [PantallaController::class, 'OrdenTrabajo'])->name('OrdenTrabajo.index');
    Route::get('/mantenimiento/herramienta', [PantallaController::class, 'herramienta'])->name('herramienta.index');
    Route::get('/mantenimiento/inspeccionHerramienta', [PantallaController::class, 'inspeccionHerramienta'])->name('inspeccionHerramienta.index');

    Route::get('/mantenimiento/infrestructura', [PantallaController::class, 'infrestructura'])->name('infrestructura.index');
    Route::get('/mantenimiento/revisionMensualInfres', [PantallaController::class, 'revisionMensualInfres'])->name('revisionMensualInfres.index');

    Route::get('/higiene', [MobileController::class, 'higienePersonal'])->name('mobile.higienePersonal');
    Route::get('/externo', [MobileController::class, 'higieneExterno'])->name('mobile.higieneExterno');
    Route::get('/lavado', [MobileController::class, 'lavadoMano'])->name('mobile.lavadoMano');
    Route::get('/verOLD', [MobileController::class, 'verOLD'])->name('mobile.verOLD');

    Route::post('/logout', [LoginController::class, 'cerrar'])->name('logout');

    Route::get('/loza78', function () {
        return view('query');
    });
    Route::get('/documentos/download/{documento}', [DocumentacionController::class, 'download'])->name('document.download');

    Route::get('/documentos/{documento}/ver', [DocumentacionController::class, 'ver'])
        ->middleware(['auth', 'can:view,documento'])
        ->name('documentos.ver');
});
