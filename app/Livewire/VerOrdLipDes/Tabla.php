<?php

namespace App\Livewire\VerOrdLipDes;

use App\Models\VerificacionOrdLipDes;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class Tabla extends Component

{

    use WithPagination;
    #[On('tablaVerificacion')]
    public function render()
    {
        return view('livewire.ver-ord-lip-des.tabla'
        ,[
            'verificaciones' => VerificacionOrdLipDes::orderBy('id', 'desc')->paginate(10)
        ]);
    }
}
