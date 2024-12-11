<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PantallaController extends Controller
{
    public function usuario(){
        return view('pantallas.usuario');
    }

    public function documentacion(){
        return view('pantallas.documentacion');
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
        return view('pantallas.verOrdLimDes');
    }
    public function orp(){
        return view('pantallas.orp');
    }
    public function reportOrp($id){
        return view('pantallas.reporteOrp',['id'=> $id]);
    }
}
