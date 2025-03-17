<?php

namespace App\Livewire\VerificacionOrdenLimpieza;

use App\Models\VerificacionOrdenLimpieza;
use Livewire\Attributes\On;
use Livewire\Component;

class Tabla extends Component
{
    #[On('VerificacionOrdenLimpieza')]
    public function render()
    {
        return view('livewire.verificacion-orden-limpieza.tabla'
        ,[
            'verificaciones' => VerificacionOrdenLimpieza::orderBy('id', 'desc')->paginate(10)
        ]);
    }
    
}
