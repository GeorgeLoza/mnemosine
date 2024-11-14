<?php

namespace App\Livewire\HigienePersonal;

use App\Models\HigienePersonal;
use Livewire\Attributes\On;
use Livewire\Component;

class Tabla extends Component
{
    public $higienes;
    #[On('tablaHigiene')]
    public function mount()
    {
        $this->higienes = HigienePersonal::all();
    }

    public function render()
    {
        return view('livewire.higiene-personal.tabla');
    }
}
