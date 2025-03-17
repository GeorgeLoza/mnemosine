<?php

namespace App\Livewire\Mantenimiento\DiarioMaquina;

use App\Models\MaquinaEquipo;
use App\Models\RevisionDiariaMaquina;
use Livewire\Component;
use Masmerise\Toaster\Toaster;

class Editar extends Component
{

    public function render()
    {
        return view('livewire.mantenimiento.diario-maquina.editar');
    }

   
}
