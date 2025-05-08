<?php
// app/Http/Livewire/Mantenimiento/Infrestructura/Editar.php

namespace App\Livewire\Mantenimiento\Infrestructura;

use Livewire\Component;
use App\Models\MantenimientoInfrestructura;
use LivewireUI\Modal\ModalComponent;

class Editar extends ModalComponent
{
    public $registro_id;
    public $codigo_interno;
    public $area;
    public $subarea;
    public $infrestructura;

    protected $rules = [
        'codigo_interno' => 'nullable|string|max:255',
        'area' => 'required|string|max:255',
        'subarea' => 'required|string|max:255',
        'infrestructura' => 'required|string|max:255'
    ];

    public function mount($id)
    {
        $registro = MantenimientoInfrestructura::findOrFail($id);
        $this->registro_id = $id;
        $this->codigo_interno = $registro->codigo_interno;
        $this->area = $registro->area;
        $this->subarea = $registro->subarea;
        $this->infrestructura = $registro->infrestructura;
    }

    public function actualizar()
    {
        $this->validate();

        MantenimientoInfrestructura::find($this->registro_id)->update([
            'codigo_interno' => $this->codigo_interno,
            'area' => $this->area,
            'subarea' => $this->subarea,
            'infrestructura' => $this->infrestructura
        ]);

        $this->dispatchBrowserEvent('notify', [
            'type' => 'success',
            'message' => '¡Registro actualizado!'
        ]);

        $this->close(andEmit: ['refresh']);
    }

    public function render()
    {
        return view('livewire.mantenimiento.infrestructura.editar');
    }
}