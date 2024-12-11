<?php

namespace App\Livewire\PersonalExterno;

use App\Models\PersonalExterno;
use Livewire\Attributes\On;
use Livewire\Component;

class Tabla extends Component
{

    #[On('tablaExternoPersonal')]
    public function render()
    {
        return view('livewire.personal-externo.tabla', [
            'externos' => PersonalExterno::orderBy('id', 'desc')->paginate(10)
        ]);
    }
}
