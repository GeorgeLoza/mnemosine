<?php

namespace App\Livewire\Mantenimiento\OrdenTrabajo;

use App\Models\MaquinaEquipo;
use App\Models\OrdenTrabajo;
use App\Models\RevisionDiariaMaquina;
use Carbon\Carbon;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;
use Masmerise\Toaster\Toaster;

class Crear extends ModalComponent
{
    public $desperfecto, $maquina_equipo_id;
    public $searchMaquina = '';

    protected $rules = [
        'desperfecto' => 'required|string',
        'maquina_equipo_id' => 'nullable|exists:maquina_equipos,id',
    ];

    public function submit()
    {
        $validatedData = $this->validate();

        $numero_ot = OrdenTrabajo::max('numero_ot');
        if ($numero_ot) {
            $numero_ot = $numero_ot + 1;
        } else {
            $numero_ot = 1;
        }


        OrdenTrabajo::create([
            'tiempo_solicitud' => now(),
            'user_solicitante' => auth()->id(),
            'numero_ot' => $numero_ot,
            'tipo_ot' => 'Correctiva',
            'desperfecto' => $validatedData['desperfecto'],
            'maquina_equipo_id' => $validatedData['maquina_equipo_id'],
            'estado' => 'Pendiente',
        ]);
        if ($validatedData['maquina_equipo_id']) {
            RevisionDiariaMaquina::create([
                'maquina_equipo_id' => $validatedData['maquina_equipo_id'],
                'tiempo' => now(),
                'estado' => 'mal', // Estado "mal"
                'observaciones' => 'Referente a la orden  '. $numero_ot,
                'correccion' => null, // Puede ser modificado si hay una corrección
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
        })
            ->get();

        return view('livewire.mantenimiento.orden-trabajo.crear', compact('maquinas'));
    }
}
