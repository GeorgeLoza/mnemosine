<?php

namespace App\Livewire\Mantenimiento\MaquinaEquipo;

use App\Models\MaquinaEquipo;
use Livewire\Attributes\On;
use Livewire\Component;

class Tabla extends Component
{

    public $maquinaEquipos;
    #[On('lista_maquina')]
    public function mount()
    {
        $this->maquinaEquipos = MaquinaEquipo::all();
    }

    public function render()
    {
        return view('livewire.mantenimiento.maquina-equipo.tabla');
    }
}
