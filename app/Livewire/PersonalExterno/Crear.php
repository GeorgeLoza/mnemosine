<?php

namespace App\Livewire\PersonalExterno;

use App\Models\PersonalExterno;
use Carbon\Carbon;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;
use Masmerise\Toaster\Toaster;

class Crear extends ModalComponent
{
     /*inputs */
     public $visita;
     public $areaInstitucion;
     public $motivo;
     public $uniforme = true;
     public $higiene = true;
     public $salud = true;
     public $objetos = true;
     public $observaciones;
     public $correccion;
     public $extra = false;

     protected $rules = [
         'visita' => 'required',
         'areaInstitucion' => 'required',
         'motivo' => 'required',
         'observaciones' => 'nullable|required_if:extra,true',
         'correccion' => 'nullable|required_if:extra,true',
     ];
     public function updated($propertyName)
    {
        // Verifica si alguno de los checkboxes es falso y activa $extra si es así
        if (in_array($propertyName, ['uniforme', 'higiene', 'salud', 'objetos'])) {
            $this->extra = !$this->uniforme || !$this->higiene || !$this->salud || !$this->objetos;
        }
    }

    public function render()
    {
        return view('livewire.personal-externo.crear');
    }
    public function submit()
    {
        $this->validate();
        try {
            PersonalExterno::create([
                'tiempo' => Carbon::now(),
                'user_id' => auth()->user()->id,
                'visita' => $this->visita,
                'areaInstitucion' => $this->areaInstitucion,
                'motivo' => $this->motivo,
                'uniforme' => $this->uniforme,
                'higiene' => $this->higiene,
                'salud' => $this->salud,
                'objetos_extranos' => $this->objetos,
                'observaciones' => $this->observaciones,
                'correccion' => $this->correccion,
            ]);

            Toaster::success('Registro guardado exitosamente!');

            // Reset fields after submission
            $this->reset([
                'visita',
                'motivo',
                'areaInstitucion',
                'uniforme',
                'higiene',
                'salud',
                'objetos',
                'observaciones',
                'correccion',
                'extra'
            ]);
        } catch (\Throwable $th) {
            dd($th);
            Toaster::error('Fallo al momento de registrar: ' . $th->getMessage());
        }
    }
}
