<?php

namespace App\Livewire\Mantenimiento;

use App\Models\Herramienta;
use Livewire\Component;

class Herramientas extends Component
{
    // Campos del formulario
    public $item, $marca, $detalle, $ultima_compra, $observaciones;
    public $herramienta_id;
    public $isEdit = false;

    // Reglas de validación
    protected $rules = [
        'item' => 'required|min:3',
        'marca' => 'required',
        'detalle' => 'required',
        'ultima_compra' => 'required|date',
    ];

    // Mostrar todos los herramientas
    public function render()
    {
        $herramientas = Herramienta::latest()->get();
        return view('livewire.mantenimiento.herramientas', compact('herramientas'));
    }

    // Guardar o Actualizar
    public function save()
    {
        $this->validate();
        
        Herramienta::updateOrCreate(
            ['id' => $this->herramienta_id],
            [
                'item' => $this->item,
                'marca' => $this->marca,
                'detalle' => $this->detalle,
                'ultima_compra' => $this->ultima_compra,
                'observaciones' => $this->observaciones,
            ]
        );

        $this->resetInputs();
    }

    // Editar
    public function edit($id)
    {
        $herramienta = Herramienta::findOrFail($id);
        $this->herramienta_id = $id;
        $this->item = $herramienta->item;
        $this->marca = $herramienta->marca;
        $this->detalle = $herramienta->detalle;
        $this->ultima_compra = $herramienta->ultima_compra;
        $this->observaciones = $herramienta->observaciones;
        $this->isEdit = true;
    }

    // Eliminar
    public function delete($id)
    {
        Herramienta::find($id)->delete();
        session()->flash('message', 'herramienta eliminado.');
    }

    // Limpiar campos
    private function resetInputs()
    {
        $this->reset(['item', 'marca', 'detalle', 'ultima_compra', 'observaciones', 'herramienta_id', 'isEdit']);
    }
    
}
