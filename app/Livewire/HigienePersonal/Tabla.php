<?php

namespace App\Livewire\HigienePersonal;

use App\Models\HigienePersonal;
use Livewire\Attributes\On;
use Livewire\Component;

class Tabla extends Component
{

    #[On('tablaHigiene')]
    public function render()
    {
        return view('livewire.higiene-personal.tabla',[
            'higienes' => HigienePersonal::orderBy('id', 'desc')->paginate(10)
        ]);
    }
}
