<?php

namespace App\Livewire\Produccion\Amasado;

use App\Models\Amasado;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;
use Masmerise\Toaster\Toaster;

class Editar extends ModalComponent
{
    public $id;
    public $amasado;



    public $tiempo_amasado1;
    public $tiempo_amasado2;
    public $temperatura;
    public $observaciones;
    public $correccion;

    protected $rules = [
        'tiempo_amasado1' => 'required',
        'tiempo_amasado2' => 'required',
        'temperatura' => 'required|numeric|min:28|max:32',
    ];


    public function mount()
    {
        $this->amasado = Amasado::find($this->id); // Usa `find` para simplificar
        $this->tiempo_amasado1 = $this->amasado->tiempo_amasado1;
        $this->tiempo_amasado2 = $this->amasado->tiempo_amasado2;
        $this->temperatura = $this->amasado->temperatura;
        $this->observaciones = $this->amasado->observaciones;
        $this->correccion = $this->amasado->correccion;
    }


    public function render()
    {
        return view('livewire.produccion.amasado.editar');
    }

    public function submit()
    {
        $this->validate();
        try {
            $this->amasado->update([
                'tiempo_amasado1' => $this->tiempo_amasado1,
                'tiempo_amasado2' => $this->tiempo_amasado2,
                'temperatura' => $this->temperatura,
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
