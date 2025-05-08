<?php

namespace App\Livewire\Mantenimiento\MensualInfrestructura;

use App\Models\MantenimientoInfrestructuras;
use App\Models\OrdenTrabajo;
use App\Models\RevisionMensual;
use Carbon\Carbon;
use Livewire\Component;

class Tabla extends Component
{
    public $area = '';
    public $subarea = '';
    public $frecuencia = '';

    public $areas = [];
    public $subareas = [];
    public $frecuencias = [];

    public $observaciones = '';
    public $correccion = '';
    public $desperfecto = '';
    public $showModal = false;
    public $selectedId = null;

    public function mount()
    {
        $this->areas = MantenimientoInfrestructuras::distinct()->pluck('area')->filter()->values();
        $this->frecuencias = MantenimientoInfrestructuras::distinct()->pluck('frecuencia')->filter()->values();
    }

    // Cambiar el nombre del método
    public function updatedArea($value) // <- Cambiado de updatedAreas a updatedArea
    {
        $this->subareas = MantenimientoInfrestructuras::where('area', $value)
            ->distinct()
            ->pluck('subarea')
            ->filter()
            ->values();

        $this->subarea = '';
        $this->frecuencia = ''; // Limpiar frecuencia al cambiar área
    }

    public function getFilteredResultsProperty()
{
    return MantenimientoInfrestructuras::query()
        ->when(!empty($this->area), fn($query) => $query->where('area', $this->area))
        ->when(!empty($this->subarea), fn($query) => $query->where('subarea', $this->subarea))
        ->when(!empty($this->frecuencia), fn($query) => $query->where('frecuencia', $this->frecuencia))
        ->get();
}

    public function registrarBien($id)
    {
        RevisionMensual::create([
            'mantenimiento_infrestructura_id' => $id,
            'fecha' => now(),
            'estado' => 'bien', // Estado "bien"
            'observaciones' => 'Revisión diaria completada exitosamente.',
            'correccion' => null, // Si no hay corrección, lo dejamos en null
        ]);

    }

    public function abrirModal($id)
    {
        $this->selectedId = $id;
        $this->showModal = true;
    }

    public function registrarObservado() // Quita el parámetro $id
{
    // Usa $this->selectedId que ya almacenaste al abrir el modal
    $id = $this->selectedId;
    
    // Validación del desperfecto
    $this->validate([
        'desperfecto' => 'required|string|min:3',
    ]);

    $numero_ot = OrdenTrabajo::max('numero_ot') + 1 ?? 1;
    
    $orden = OrdenTrabajo::create([
        'tiempo_solicitud' => now(),
        'user_solicitante' => auth()->id(),
        'numero_ot' => $numero_ot,
        'tipo_ot' => 'Correctiva',
        'desperfecto' => $this->desperfecto,
        'maquina_equipo_id' => null,
        'mantenimiento_infrestructura_id' => $id,
        'estado' => 'Pendiente',
    ]);

    RevisionMensual::create([
        'mantenimiento_infrestructura_id' => $id,
        'fecha' => now(),
        'estado' => 'observado',
        'observaciones' => $numero_ot,
        'correccion' => null,
    ]);

    // Limpia los campos y cierra el modal
    $this->reset(['desperfecto', 'showModal', 'selectedId']);
}

    public function render()
    {
        return view('livewire.mantenimiento.mensual-infrestructura.tabla', [
            'infrestructuras' => $this->filteredResults,
        ]);
    }
}
