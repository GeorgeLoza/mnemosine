<?php

namespace App\Livewire\LavadoMano;

use App\Models\LavadoMano;
use Livewire\Attributes\On;
use Livewire\Component;

class Tabla extends Component
{
    public $lavados;

    #[On('tablalavado')]
    public function mount()
    {
        $this->lavados = LavadoMano::all();
    }
    public function render()
    {
        return view('livewire.lavado-mano.tabla');
    }
}
