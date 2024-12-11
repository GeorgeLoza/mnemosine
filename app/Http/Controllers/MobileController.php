<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MobileController extends Controller
{

    public function higienePersonal(){
        return view('mobile.higienePersonal');
    }
    public function higieneExterno(){
        return view('mobile.higieneExterno');
    }
    public function lavadoMano(){
        return view('mobile.lavadoMano');
    }
    public function verOLD(){
        return view('mobile.verOLD');
    }

}
