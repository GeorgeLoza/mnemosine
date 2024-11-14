<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MobileController extends Controller
{

    public function higienePersonal(){
        return view('mobile.higienePersonal');
    }
    public function lavadoMano(){
        return view('mobile.lavadoMano');
    }

}
