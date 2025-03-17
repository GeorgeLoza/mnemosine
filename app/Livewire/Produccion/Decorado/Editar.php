<?php

namespace App\Livewire\Produccion\Decorado;

use App\Models\Decorado;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;
use Masmerise\Toaster\Toaster;

class Editar extends ModalComponent
{
    public $etapa;
    public $orp;
    public $preparacion;


    public $huevo;
    public $semilla;
    public $polenta;

    protected $rules = [];

    public function mount($etapa = null, $orp)
    {
        $this->etapa = $etapa;
        $this->orp = $orp;


        $this->preparacion = Decorado::where('orp_id', $this->orp)
            ->orderBy('id', 'desc') // Ordena por la columna 'id' de manera descendente
            ->first(); // Obtén el primer registro después de ordenar

        $this->huevo = $this->preparacion->huevo / 1;
        $this->semilla = $this->preparacion->semilla / 1;
        $this->polenta = $this->preparacion->polenta / 1;
    }


    public function render()
    {
        return view('livewire.produccion.decorado.editar');
    }

    public function submit()
    {
        try {
            $this->preparacion->update([
                'huevo' => $this->huevo,
                'semilla' => $this->semilla,
                'polenta' => $this->polenta,
            ]);


            $this->dispatch('reporte');
            $this->closeModal();
            Toaster::success('Registro actualizado exitosamente!');
        } catch (\Throwable $th) {
            Toaster::error('Fallo al momento de actualizar: ' . $th->getMessage());
        }
    }
}
