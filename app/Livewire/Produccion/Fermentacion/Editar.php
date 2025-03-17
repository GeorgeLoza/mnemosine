<?php

namespace App\Livewire\Produccion\Fermentacion;

use App\Models\Fermentacion;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;
use Masmerise\Toaster\Toaster;

class Editar extends ModalComponent
{

    public $id;

    public $fermentacion;
    public $ncamara;
    public $hora_inicio;
    public $humedad;
    public $temperatura;
    public $hora_salida;
    public $observaciones;
    public $correccion;


    public function mount()
    {
        $this->fermentacion = Fermentacion::find($this->id); // Usa `find` para simplificar        

        $this->ncamara = $this->fermentacion->ncamara;
        $this->hora_inicio = $this->fermentacion->hora_inicio;
        $this->humedad = $this->fermentacion->humedad;
        $this->temperatura = $this->fermentacion->temperatura;
        $this->hora_salida = $this->fermentacion->hora_salida;
        $this->observaciones = $this->fermentacion->observaciones;
        $this->correccion = $this->fermentacion->correccion;
    }


    public function render()
    {
        return view('livewire.produccion.fermentacion.editar');
    }

    public function submit()
    {
        try {
            $this->fermentacion->update([

                'ncamara' => $this->ncamara,
                'hora_inicio' => $this->hora_inicio,
                'humedad' => $this->humedad,
                'temperatura' => $this->temperatura,
                'hora_salida' => $this->hora_salida,
                'observaciones' => $this->observaciones,
                'correccion' => $this->correccion,
                

            ]);
            $this->dispatch('reporte');
            $this->closeModal();
            Toaster::success('Registro actualizado exitosamente!');
        } catch (\Throwable $th) {
            Toaster::error('Fallo al momento de actualizar: ' . $th->getMessage());
        }
    }
}
