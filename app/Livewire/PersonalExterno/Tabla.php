<?php

namespace App\Livewire\PersonalExterno;

use App\Models\PersonalExterno;
use Livewire\Attributes\On;
use Livewire\Component;
use Masmerise\Toaster\Toaster;

class Tabla extends Component
{

    #[On('tablaExternoPersonal')]
    public function render()
    {
        return view('livewire.personal-externo.tabla', [
            'externos' => PersonalExterno::orderBy('id', 'desc')->paginate(10)
        ]);
    }

    public function delete($id)
    {
        PersonalExterno::findOrFail($id)->delete();
        Toaster::success('Registro Eliminado exitosamente!');
        $this->dispatch('tablaHigiene');
    }
}
