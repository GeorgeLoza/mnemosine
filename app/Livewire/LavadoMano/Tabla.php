<?php

namespace App\Livewire\LavadoMano;

use App\Models\LavadoMano;
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


    #[On('tablalavado')]
    public function render()
    {
        $query = LavadoMano::with(['user'])
            ->orderBy('tiempo', 'desc');

        // Filtros
        if ($this->fecha) {
            $query->whereDate('tiempo', $this->fecha);
        }

        if ($this->codigo) {
            $query->whereHas('user', function($q) {
                $q->where('codigo', 'like', '%'.$this->codigo.'%');
            });
        }

        if ($this->nombre) {
            $query->whereHas('user', function($q) {
                $q->where('name', 'like', '%'.$this->nombre.'%');
            });
        }

        if ($this->apellido) {
            $query->whereHas('user', function($q) {
                $q->where('lastname', 'like', '%'.$this->apellido.'%');
            });
        }if ($this->sector && $this->sector != 'Almacenes') {
            $query->whereHas('user', function ($q) {
                $q->whereNot('turno', 'Almacenes');
            });
        }

        if ($this->sector && $this->sector == 'Almacenes') {
            $query->whereHas('user', function ($q) {
                $q->where('turno', 'Almacenes');
            });
        }

        $lavados = $query->paginate(50);

        return view('livewire.lavado-mano.tabla', [
            'lavados' => $lavados
        ]);
    }


    public function resetFilters()
    {
        $this->reset(['fecha', 'codigo', 'nombre', 'apellido','sector']);
        $this->resetPage();
    }

    public function delete($id)
    {
        LavadoMano::findOrFail($id)->delete();
        Toaster::success('Registro Eliminado exitosamente!');
        $this->dispatch('tablalavado');
    }


}
