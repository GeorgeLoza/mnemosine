<?php

namespace App\Http\Controllers;

use App\Models\Documentacion;
use Illuminate\Http\Request;

class PantallaController extends Controller
{
    public function usuario(){
        return view('pantallas.usuario');
    }

    public function documentacion(){
        return view('pantallas.documentacion');
    }
    
    public function documentacionVer($id)
    {
        $documentacion = Documentacion::findOrFail($id);
        return view('pantallas.documentacionVer', compact('documentacion'));
    }
    public function higienePersonal(){
        return view('pantallas.higienePersonal');
    }
    public function LavadoMano(){
        return view('pantallas.lavadoMano');
    }
    public function externoPersonal(){
        return view('pantallas.externo');
    }
    public function ordLimDes(){
        return view('pantallas.ordLimDes');
    }
    public function verOrdLimDes(){
        return view('pantallas.ordenLimpieza');
    }
    public function reporteOrdLimDes(){
        return view('pantallas.reporteLimpiezaDesinfeccion');
    }
    public function orp(){
        return view('pantallas.orp');
    }
    public function reportOrp($id){
        return view('pantallas.reporteOrp',['id'=> $id]);
    }
    public function maquina(){
        return view('pantallas.maquina');
    }
    public function maquinaDetalle($id){
        return view('pantallas.maquinaDetalle',['id'=> $id]);
    }
    public function revisionDiaria(){
        return view('pantallas.revisionDiaria');
    }
    
    public function OrdenTrabajo($tipo){
        
        return view('pantallas.OrdenTrabajo', compact('tipo'));
    }
    public function ReporteHigienePersonal(){
        return view('pantallas.reporteHigienePersonal');
    }
    public function Reporte2HigienePersonal(){
        return view('pantallas.reporte2HigienePersonal');
    }
    public function ReporteLavadoMano(){
        return view('pantallas.reporteLavadoMano');
    }
    public function herramienta(){
        return view('pantallas.herramienta');
    }
    public function inspeccionHerramienta(){
        return view('pantallas.inspeccionHerramienta');
    }
    public function curacion(){
        return view('pantallas.curacion');
    }
    public function sustancias(){
        return view('pantallas.sustancia');
    }
    public function evacuacion(){
        return view('pantallas.evacuacion');
    }
    public function reporteEvacuacion(){
        return view('pantallas.reporteEvacuacion');
    }

    public function infrestructura(){
        return view('pantallas.infrestructura');
    }
    public function revisionMensualInfres(){
        return view('pantallas.revisionMensualInfres');
    }
}
