<?php

namespace App\Livewire\Mantenimiento\OrdenTrabajo;

use App\Models\VerificacionHerramienta as ModelsVerificacionHerramienta;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;
use Masmerise\Toaster\Toaster;

class VerificacionHerramienta extends ModalComponent
{
    public $ot_id;
    public $herramientasRepuestos;
    public $herramienta;
    public $cantidad_ingreso;
    public $cantidad_salida = [];
    public $observaciones;

    public function mount()
    {
        $this->actualizarLista();
    }

    public function actualizarLista()
    {
        $this->herramientasRepuestos = ModelsVerificacionHerramienta::where('orden_trabajo_id', $this->ot_id)->get();
    }

    public function submit()
    {
        $this->validate([
            'herramienta' => 'required|string',
            'cantidad_ingreso' => 'required|numeric|min:0',
        ]);

        try {
            ModelsVerificacionHerramienta::create([
                'tiempo' => now(),
                'orden_trabajo_id' => $this->ot_id,
                'herramienta' => $this->herramienta,
                'cantidad_ingreso' => $this->cantidad_ingreso,
                'user_ingreso' => auth()->id(),
                'observaciones' => $this->observaciones,
            ]);

            $this->reset(['herramienta', 'cantidad_ingreso']);
            $this->actualizarLista();
            Toaster::success('Registro agregado correctamente!');
        } catch (\Throwable $th) {
            Toaster::error('Fallo al momento de registrar: ' . $th->getMessage());
        }
    }

    public function guardarSalida($id)
    {
        try {
            if (isset($this->cantidad_salida[$id]) && $this->cantidad_salida[$id] !== null) {
                $cantidad = $this->cantidad_salida[$id];
                $herramienta = ModelsVerificacionHerramienta::findOrFail($id);
                $herramienta->cantidad_salida = $cantidad;
                $herramienta->user_salida = auth()->id();
                $herramienta->save();

                unset($this->cantidad_salida[$id]);
                $this->actualizarLista();
                Toaster::success('Cantidad de salida actualizada correctamente.');
            }
        } catch (\Throwable $th) {
            Toaster::error('Error al guardar salida: ' . $th->getMessage());
        }
    }

    public function delete($id)
    {
        try {
            ModelsVerificacionHerramienta::findOrFail($id)->delete();
            $this->actualizarLista();
            Toaster::success('Registro eliminado correctamente.');
        } catch (\Throwable $th) {
            Toaster::error('Error al eliminar: ' . $th->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.mantenimiento.orden-trabajo.verificacion-herramienta');
    }
}
