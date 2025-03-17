<?php

namespace App\Livewire\VerificacionOrdenLimpieza;

use App\Models\OrdenLimpieza;
use App\Models\VerificacionOrdenLimpieza;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Masmerise\Toaster\Toaster;

class Crear extends Component
{
    public $responsables, $areas = [], $grupos = [], $periodos = [];
    public $responsable, $area, $grupo, $periodo;


    public $selectedOrdenId, $observaciones, $correccion;
    public $showModal = false;


    public function mount()
    {
        // Obtener valores únicos para el primer select
        $this->responsables = OrdenLimpieza::distinct()->pluck('responsable');
    }

    public function updatedResponsable($value)
    {

        $this->areas = OrdenLimpieza::where('responsable', $value)->distinct()->pluck('area');
        $this->reset(['area', 'grupos', 'grupo', 'periodos', 'periodo']);
    }

    public function updatedArea($value)
    {
        $this->grupos = OrdenLimpieza::where('responsable', $this->responsable)
            ->where('area', $value)
            ->distinct()
            ->pluck('grupo');
        $this->reset(['grupo', 'periodos', 'periodo']);
    }

    public function updatedGrupo($value)
    {
        $this->periodos = OrdenLimpieza::where('responsable', $this->responsable)
            ->where('area', $this->area)
            ->where('grupo', $value)
            ->distinct()
            ->pluck('periodo');
        $this->reset('periodo');
    }


    public function getFilteredResultsProperty()
    {
        return OrdenLimpieza::when($this->responsable, fn($query) => $query->where('responsable', $this->responsable))
            ->when($this->area, fn($query) => $query->where('area', $this->area))
            ->when($this->grupo, fn($query) => $query->where('grupo', $this->grupo))
            ->when($this->periodo, fn($query) => $query->where('periodo', $this->periodo))
            ->whereDoesntHave('verificaciones', function ($query) {
                $query->whereDate('tiempo', now()->toDateString());
            })
            ->get();
    }

    // Registrar con estado "Bien"
    public function registrarBien($ordenId)
    {
        VerificacionOrdenLimpieza::create([
            'tiempo' => now(),
            'user_id' => Auth::id(),
            'orden_limpieza_id' => $ordenId,
            'estado' => "Bien",
            'observaciones' => null,
            'correccion' => null,
        ]);

        Toaster::success('Usuario creado exitosamente!');
    }

    // Abrir modal para observaciones
    public function abrirModal($ordenId)
    {
        $this->selectedOrdenId = $ordenId;
        $this->observaciones = '';
        $this->correccion = '';
        $this->showModal = true;
    }

    // Registrar con estado "Observado"
    public function registrarObservado()
    {
        VerificacionOrdenLimpieza::create([
            'tiempo' => now(),
            'user_id' => Auth::id(),
            'orden_limpieza_id' => $this->selectedOrdenId,
            'estado' => "Observado",
            'observaciones' => $this->observaciones,
            'correccion' => $this->correccion,
        ]);

        $this->showModal = false;
        Toaster::success('Usuario creado exitosamente!');
    }

    public function render()
    {
        return view('livewire.verificacion-orden-limpieza.crear', [
            'ordenes' => $this->filteredResults
        ]);
    }
}
