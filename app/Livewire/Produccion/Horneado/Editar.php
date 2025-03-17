<?php

namespace App\Livewire\Produccion\Horneado;

use App\Models\Horneado;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;
use Masmerise\Toaster\Toaster;

class Editar extends ModalComponent
{
    public $id;

    public $horneado;
    public $verificacion_corte;
    public $nhorno;
    public $tiempo_horneado;
    public $temperatura;
    public $temperatura_nucleo;
    public $observaciones;
    public $correccion;


    public function mount()
    {
        $this->horneado = Horneado::find($this->id); // Usa `find` para simplificar        

        $this->verificacion_corte = $this->horneado->verificacion_corte;
        $this->nhorno = $this->horneado->nhorno;
        $this->tiempo_horneado = $this->horneado->tiempo_horneado;
        $this->temperatura = $this->horneado->temperatura;
        $this->temperatura_nucleo = $this->horneado->temperatura_nucleo;
        $this->observaciones = $this->horneado->observaciones;
        $this->correccion = $this->horneado->correccion;
    }


    public function render()
    {
        return view('livewire.produccion.horneado.editar');
    }
    public function submit()
    {
        try {
            $this->horneado->update([

                'verificacion_corte' => $this->verificacion_corte,
                'nhorno' => $this->nhorno,
                'tiempo_horneado' => $this->tiempo_horneado,
                'temperatura' => $this->temperatura,
                'temperatura_nucleo' => $this->temperatura_nucleo,
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
