<?php

namespace App\Livewire\VerificacionOrdenLimpieza;

use App\Models\User;
use App\Models\VerificacionOrdenLimpieza;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class Tabla extends Component
{
    use WithPagination;

    public $fechaInicio;
    public $fechaFin;
    public $area = '';
    public $supervisor = '';

    #[On('VerificacionOrdenLimpieza')]
    public function render()
    {
        $query = VerificacionOrdenLimpieza::query()
            ->with(['ordenLimpieza', 'user'])
            ->orderBy('tiempo', 'desc');

        // Aplicar filtros
        if ($this->fechaInicio) {
            $query->whereDate('tiempo', '>=', $this->fechaInicio);
        }
        if ($this->fechaFin) {
            $query->whereDate('tiempo', '<=', $this->fechaFin);
        }
        if ($this->area) {
            $query->whereHas('ordenLimpieza', function ($q) {
                $q->where('area', $this->area);
            });
        }
        if ($this->supervisor) {
            $query->whereHas('user', function ($q) {
                $q->where('id', $this->supervisor);
            });
        }

        // Obtener opciones para filtros
        $areas = VerificacionOrdenLimpieza::join('orden_limpiezas', 'verificacion_orden_limpiezas.orden_limpieza_id', '=', 'orden_limpiezas.id')
            ->select('orden_limpiezas.area')
            ->distinct()
            ->pluck('area')
            ->filter();

        $supervisores = User::whereHas('verificacionesOrdenLimpieza')
            ->select('id', 'name', 'lastname')
            ->distinct()
            ->get();

        return view('livewire.verificacion-orden-limpieza.tabla', [
            'verificaciones' => $query->paginate(10),
            'areas' => $areas,
            'supervisores' => $supervisores
        ]);
    }

    public function resetFilters()
    {
        $this->reset(['fechaInicio', 'fechaFin', 'area', 'supervisor']);
    }
}