<?php

namespace App\Livewire\HigienePersonal;

use App\Models\HigienePersonal;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class Tabla extends Component
{
    use WithPagination;

    public $fecha;
    public $codigo;
    public $nombre;
    public $apellido;

    #[On('tablaHigiene')]
    public function render()
    {
        $query = HigienePersonal::with(['trabajador', 'supervisor'])
            ->orderBy('id', 'desc');

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

        $higienes = $query->paginate(50);

        return view('livewire.higiene-personal.tabla', [
            'higienes' => $higienes
        ]);
    }

    public function resetFilters()
    {
        $this->reset(['fecha', 'codigo', 'nombre', 'apellido']);
        $this->resetPage();
    }
}
