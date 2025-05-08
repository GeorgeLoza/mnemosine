<?php

namespace App\Livewire\Mantenimiento\InspeccionHerramienta;

use App\Models\Herramienta;
use App\Models\InspeccionHerramientas;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;
use Masmerise\Toaster\Toaster;

class Crear extends ModalComponent
{
    public $tiempo;
    public $seleccion = []; // Array con estructura [herramienta_id => ['cantidad' => '', 'observaciones' => '']]
    public $selectAll = false;

    protected $rules = [
        'tiempo' => 'required|date',
        'seleccion.*.cantidad' => 'required|integer|min:1',
        'seleccion.*.observaciones' => 'nullable|string|max:255'
    ];

    protected $messages = [
        'seleccion.*.cantidad.required' => 'La cantidad es obligatoria',
        'seleccion.*.cantidad.integer' => 'La cantidad debe ser un número entero',
        'seleccion.*.cantidad.min' => 'La cantidad mínima es 1'
    ];

    public function updatedSelectAll($value)
    {
        if ($value) {
            $this->seleccion = Herramienta::all()->mapWithKeys(function ($herramienta) {
                return [$herramienta->id => ['cantidad' => 1, 'observaciones' => '']];
            })->toArray();
        } else {
            $this->seleccion = [];
        }
    }

    public function save()
    {
        $this->validate();

        foreach ($this->seleccion as $herramienta_id => $datos) {
            InspeccionHerramientas::create([
                'herramienta_id' => $herramienta_id,
                'tiempo' => $this->tiempo,
                'cantidad' => $datos['cantidad'],
                'observaciones' => $datos['observaciones']
            ]);
        }

        $this->dispatch('inpesccionHerramienta');
        $this->closeModal();
        Toaster::success('Registro guardado exitosamente!');
    }

    public function render()
    {
        $herramientas = Herramienta::all();
        return view('livewire.mantenimiento.inspeccion-herramienta.crear', compact('herramientas'));
    }
}
