<?php

namespace App\Livewire\Mantenimiento\OrdenTrabajo;

use App\Models\MaquinaEquipo;
use App\Models\MantenimientoInfrestructura;
use App\Models\MantenimientoInfrestructuras;
use App\Models\OrdenTrabajo;
use App\Models\RevisionDiariaMaquina;
use App\Models\RevisionMensual;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;
use Masmerise\Toaster\Toaster;

class Crear extends ModalComponent
{
    public $desperfecto, $maquina_equipo_id, $mantenimiento_infrestructura_id;
    public $searchMaquina = '';
    public $searchInfrestructura = '';
    public $tipoSeleccion; // 'maquina' o 'infrestructura'

    protected $rules = [
        'desperfecto' => 'required|string',
        'maquina_equipo_id' => 'nullable|required_if:tipoSeleccion,maquina|exists:maquina_equipos,id',
        'mantenimiento_infrestructura_id' => 'nullable|required_if:tipoSeleccion,infrestructura|exists:mantenimiento_infrestructuras,id',
    ];

    public function submit()
{
    $validatedData = $this->validate();

    
    $numero_ot = OrdenTrabajo::max('numero_ot') + 1 ?? 1;

    $orden = OrdenTrabajo::create([
        'tiempo_solicitud' => now(),
        'user_solicitante' => auth()->id(),
        'numero_ot' => $numero_ot,
        'tipo_ot' => 'Correctiva',
        'desperfecto' => $validatedData['desperfecto'],
        'maquina_equipo_id' => $this->tipoSeleccion === 'maquinaria' ? $validatedData['maquina_equipo_id'] : null,
        'mantenimiento_infrestructura_id' => $this->tipoSeleccion === 'infrestructura' ? $validatedData['mantenimiento_infrestructura_id'] : null,
        'estado' => 'Pendiente',
    ]);

    if ($this->tipoSeleccion === 'maquinaria' && $validatedData['maquina_equipo_id']) {
        RevisionDiariaMaquina::create([
            'maquina_equipo_id' => $validatedData['maquina_equipo_id'],
            'tiempo' => now(),
            'estado' => 'mal',
            'observaciones' => $numero_ot,
            'correccion' => null,
        ]);
    }
    // Nuevo bloque para infraestructura
    elseif ($this->tipoSeleccion === 'infrestructura' && $validatedData['mantenimiento_infrestructura_id']) {
        RevisionMensual::create([
            'mantenimiento_infrestructura_id' => $validatedData['mantenimiento_infrestructura_id'],
            'fecha' => now(),
            'estado' => 'mal',
            'observaciones' => $numero_ot,
            'correccion' => null,
        ]);
    }

    $this->dispatch('orden_trabajo');
    $this->closeModal();
    Toaster::success('Registro guardado exitosamente!');
}

    public function render()
    {
        
        $maquinas = MaquinaEquipo::when($this->searchMaquina, function ($query) {
            $search = '%' . $this->searchMaquina . '%';
            $query->where('codigo_interno', 'like', $search)
                ->orWhere('linea', 'like', $search)
                ->orWhere('tipo', 'like', $search)
                ->orWhere('marca', 'like', $search);
        })->get();

        $infrestructuras = MantenimientoInfrestructuras::when($this->searchInfrestructura, function ($query) {
            $search = '%' . $this->searchInfrestructura . '%';
            $query->where('codigo_interno', 'like', $search)
                ->orWhere('area', 'like', $search)
                ->orWhere('subarea', 'like', $search)
                ->orWhere('infrestructura', 'like', $search);
        })->get();

        return view('livewire.mantenimiento.orden-trabajo.crear', compact('maquinas', 'infrestructuras'));
    }

    public function cerrar()
    {
        $this->closeModal();
    }
}