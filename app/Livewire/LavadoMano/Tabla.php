<?php

namespace App\Livewire\LavadoMano;

use App\Models\LavadoMano;
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


    #[On('tablalavado')]
    public function render()
    {
        $query = LavadoMano::with(['user'])
            ->orderBy('id', 'desc');

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
        }

        $lavados = $query->paginate(50);

        return view('livewire.lavado-mano.tabla', [
            'lavados' => $lavados
        ]);
    }






}
