<?php

namespace App\Livewire\HigienePersonal;

use App\Models\HigienePersonal;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;
use Masmerise\Toaster\Toaster;

class Tabla extends Component
{
    use WithPagination;

    public $fecha;
    public $codigo;
    public $nombre;
    public $apellido;
    public $sector;

    #[On('tablaHigiene')]
    public function render()
    {
        $query = HigienePersonal::with(['trabajador', 'supervisor'])
            ->orderBy('tiempo', 'desc');

        // Filtros
        if ($this->fecha) {
            $query->whereDate('tiempo', $this->fecha);
        }

        if ($this->codigo) {
            $query->whereHas('trabajador', function ($q) {
                $q->where('codigo', 'like', '%' . $this->codigo . '%');
            });
        }

        if ($this->nombre) {
            $query->whereHas('trabajador', function ($q) {
                $q->where('name', 'like', '%' . $this->nombre . '%');
            });
        }

        if ($this->apellido) {
            $query->whereHas('trabajador', function ($q) {
                $q->where('lastname', 'like', '%' . $this->apellido . '%');
            });
        }
        
        if ($this->sector && $this->sector != 'Almacenes') {
            $query->whereHas('trabajador', function ($q) {
                $q->whereNot('turno', 'Almacenes');
            });
        }

        if ($this->sector && $this->sector == 'Almacenes') {
            $query->whereHas('trabajador', function ($q) {
                $q->where('turno', 'Almacenes');
            });
        }

        $higienes = $query->paginate(50);

        return view('livewire.higiene-personal.tabla', [
            'higienes' => $higienes
        ]);
    }
        public function delete($id)
        {
            HigienePersonal::findOrFail($id)->delete();
            Toaster::success('Registro Eliminado exitosamente!');
            $this->dispatch('tablaHigiene');
        }

    public function resetFilters()
    {
        $this->reset(['fecha', 'codigo', 'nombre', 'apellido','sector']);
        $this->resetPage();
    }
}
