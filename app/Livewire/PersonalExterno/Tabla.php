<?php

namespace App\Livewire\PersonalExterno;

use App\Models\PersonalExterno;
use Livewire\Attributes\On;
use Livewire\Component;

class Tabla extends Component
{
    public $externos;
    #[On('tablaExternoPersonal')]
    public function mount()
    {
        $this->externos = PersonalExterno::all();
    }

    public function render()
    {
        return view('livewire.personal-externo.tabla');
    }
}
