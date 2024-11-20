<?php

namespace App\Livewire\Documentacion;

use App\Models\Documentacion;
use Livewire\Attributes\On;
use Livewire\Component;

class Tabla extends Component
{
    public $documentos;
    #[On('tablaDocumentos')]
    public function mount()
    {
        $this->documentos = Documentacion::all();
    }

    public function render()
    {
        return view('livewire.documentacion.tabla');
    }
}
