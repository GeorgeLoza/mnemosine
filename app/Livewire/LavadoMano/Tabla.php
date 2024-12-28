<?php

namespace App\Livewire\LavadoMano;

use App\Models\LavadoMano;
use Livewire\Attributes\On;
use Livewire\Component;

class Tabla extends Component
{

    #[On('tablalavado')]
    public function render()
    {
        return view('livewire.lavado-mano.tabla',[
            'lavados' => LavadoMano::orderBy('id', 'desc')->paginate(50)
        ]);
    }






}
