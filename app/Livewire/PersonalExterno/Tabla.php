<?php

namespace App\Livewire\PersonalExterno;

use App\Models\PersonalExterno;
use Livewire\Attributes\On;
use Livewire\Component;
use Masmerise\Toaster\Toaster;
use Livewire\WithPagination;

class Tabla extends Component
{
    use WithPagination;

    public $fecha;
    #[On('tablaExternoPersonal')]
    public function render()
    {
        $query = PersonalExterno::orderBy('id', 'desc');

        // Aplicar filtro por fecha si existe
        if ($this->fecha) {
            $query->whereDate('tiempo', $this->fecha);
        }

        return view('livewire.personal-externo.tabla', [
            'externos' => $query->paginate(10),
        ]);
    }
    public function resetFilters()
    {
        $this->reset(['fecha']);
        $this->resetPage();
    }

    public function delete($id)
    {
        PersonalExterno::findOrFail($id)->delete();
        Toaster::success('Registro Eliminado exitosamente!');
        $this->dispatch('tablaHigiene');
    }
}
