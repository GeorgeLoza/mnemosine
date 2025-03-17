<?php

namespace App\Livewire\Produccion\DivisionFormadoDecorado;

use App\Models\DivisionFormadoDecorado;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;
use Masmerise\Toaster\Toaster;

class Editar extends ModalComponent
{
    public $id;

    public $division;
    public $peso_crudo1;
    public $peso_crudo2;
    public $peso_crudo3;
    public $peso_crudo4;
    public $peso_crudo_prom;
    public $peso_ajonjoli1;
    public $peso_ajonjoli2;
    public $peso_ajonjoli3;
    public $peso_ajonjoli4;
    public $peso_ajonjoli_prom;
    public $centreado;
    public $uniformidad;
    public $homogeneidad;


    public $observaciones;
    public $correccion;

    protected $rules = [
        'peso_crudo1' => 'required|numeric|min:28|max:32',
        'peso_crudo2' => 'required|numeric|min:28|max:32',
        'peso_crudo3' => 'required|numeric|min:28|max:32',
        'peso_crudo4' => 'required|numeric|min:28|max:32',
        'peso_ajonjoli1' => 'required|numeric',
        'peso_ajonjoli2' => 'required|numeric',
        'peso_ajonjoli3' => 'required|numeric',
        'peso_ajonjoli4' => 'required|numeric',
    ];
    public function mount()
    {
        $this->division = DivisionFormadoDecorado::find($this->id); // Usa `find` para simplificar        

        $this->peso_crudo1 = $this->division->peso_crudo1;
        $this->peso_crudo2 = $this->division->peso_crudo2;
        $this->peso_crudo3 = $this->division->peso_crudo3;
        $this->peso_crudo4 = $this->division->peso_crudo4;
        $this->peso_ajonjoli1 = $this->division->peso_ajonjoli1;
        $this->peso_ajonjoli2 = $this->division->peso_ajonjoli2;
        $this->peso_ajonjoli3 = $this->division->peso_ajonjoli3;
        $this->peso_ajonjoli4 = $this->division->peso_ajonjoli4;
        $this->centreado = $this->division->centreado;
        $this->uniformidad = $this->division->uniformidad;
        $this->homogeneidad = $this->division->homogeneidad;
        $this->observaciones = $this->division->observaciones;
        $this->correccion = $this->division->correccion;
    }

    public function updated()
    {
        $this->peso_crudo_prom = (
            (float) $this->peso_crudo1 +
            (float) $this->peso_crudo2 +
            (float) $this->peso_crudo3 +
            (float) $this->peso_crudo4
        ) / 4;

        $this->peso_ajonjoli_prom = (
            (float) $this->peso_ajonjoli1 +
            (float) $this->peso_ajonjoli2 +
            (float) $this->peso_ajonjoli3 +
            (float) $this->peso_ajonjoli4
        ) / 4;
    }

    public function render()
    {
        return view('livewire.produccion.division-formado-decorado.editar');
    }
    public function submit()
    {
        $this->validate();
        try {
            $this->division->update([

                'peso_crudo1' => $this->peso_crudo1,
                'peso_crudo2' => $this->peso_crudo2,
                'peso_crudo3' => $this->peso_crudo3,
                'peso_crudo4' => $this->peso_crudo4,
                'peso_ajonjoli1' => $this->peso_ajonjoli1,
                'peso_ajonjoli2' => $this->peso_ajonjoli2,
                'peso_ajonjoli3' => $this->peso_ajonjoli3,
                'peso_ajonjoli4' => $this->peso_ajonjoli4,
                'centreado' => $this->centreado,
                'uniformidad' => $this->uniformidad,
                'homogeneidad' => $this->homogeneidad,
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
