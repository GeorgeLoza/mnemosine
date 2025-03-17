<?php

namespace App\Livewire\Produccion\Distribucion;

use App\Models\distribucion;
use Carbon\Carbon;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;
use Masmerise\Toaster\Toaster;

class Crear extends ModalComponent
{
    public $orp;

    public $razon_social;
    public $ubicacion;
    public $cantidad;
    public $observaciones;
    public $correccion;

    public function render()
    {
        return view('livewire.produccion.distribucion.crear');
    }
    public function submit()
    {

        
        try {
            distribucion::create([
                'tiempo' => Carbon::now(),
                'orp_id' => $this->orp,
                'razon_social' => $this->razon_social,
                'ubicacion' => $this->ubicacion,
                'cantidad' => $this->cantidad,
                'user_id' => auth()->user()->id,
                'observaciones' => $this->observaciones,
                'correccion' => $this->correccion,
            ]);
            $this->dispatch('reporte');
            $this->closeModal();
            Toaster::success('Registro guardado exitosamente!');

            // Reset fields after submission
            $this->reset([
                'observaciones',
                'correccion',
            ]);
        } catch (\Throwable $th) {

            Toaster::error('Fallo al momento de registrar: ' . $th->getMessage());
        }
    }
}
