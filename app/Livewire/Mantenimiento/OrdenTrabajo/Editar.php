<?php

namespace App\Livewire\Mantenimiento\OrdenTrabajo;

use App\Models\OrdenTrabajo;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;
use Masmerise\Toaster\Toaster;

class Editar extends ModalComponent
{
    public $id,$ordenTrabajo, $estado, $tiempo_respuesta, $accion;

    protected $rules = [
        'tiempo_respuesta' => 'required|date',
        'accion' => 'nullable|string',
    ];

    public function mount($id)
    {
        $this->ordenTrabajo = OrdenTrabajo::find($id);
        
    }

    public function submit()
    {
        $this->validate();

        $this->ordenTrabajo->update([
            'estado' => 'Por Revisar',
            'tiempo_respuesta' => $this->tiempo_respuesta,
            'user_tecnico' => auth()->id(),
            'accion' => $this->accion,
        ]);

        $this->dispatch('orden_trabajo');
            $this->closeModal();
        Toaster::success('Registro guardado exitosamente!');

        
    }
    public function render()
    {
        return view('livewire.mantenimiento.orden-trabajo.editar');
    }
    public function cerrar()
    {
        $this->closeModal();
    }
}
