<?php

namespace App\Livewire\VerOrdLipDes;

use App\Models\VerificacionOrdLipDes;
use Livewire\Attributes\On;
use Livewire\Component;

class Tabla extends Component
{

    #[On('tablaVerificacion')]
    public function render()
    {
        return view('livewire.ver-ord-lip-des.tabla'
        ,[
            'verificaciones' => VerificacionOrdLipDes::orderBy('id', 'desc')->paginate(10)
        ]);
    }
}
