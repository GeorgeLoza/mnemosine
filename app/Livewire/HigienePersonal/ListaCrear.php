<?php

namespace App\Livewire\HigienePersonal;

use App\Models\HigienePersonal;
use App\Models\User;
use Carbon\Carbon;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;
use Masmerise\Toaster\Toaster;

class ListaCrear extends ModalComponent
{
    public $id;
    public $uniforme ;
    public $higiene ;
    public $salud ;
    public $objetos ;
    public $observaciones ;
    public $correccion ;

    public $user;

    protected $rules = [
        'observaciones' => 'required',
        'correccion' => 'required',
    ];


    public function mount()
    {
    $this->user =User::where('id',$this->id)->first();
    }

    public function render()
    {
        return view('livewire.higiene-personal.lista-crear');
    }

    public function submit(){

        $this->validate();
        $uniforme = ($this->uniforme==null) ? 0 : 1 ;
        $higiene = ($this->higiene==null) ? 0 : 1 ;
        $salud = ($this->salud==null) ? 0 : 1 ;
        $objetos = ($this->objetos==null) ? 0 : 1 ;
        try {
            HigienePersonal::create([
                'supervisor_id' => auth()->user()->id,
                'trabajador_id' => $this->id,
                'tiempo' => Carbon::now(),
                'uniforme' => $uniforme,
                'higiene' => $higiene,
                'salud' => $salud,
                'objetos_extranos' => $objetos,
                'observaciones' => $this->observaciones,
                'correccion' => $this->correccion,
            ]);

            Toaster::success('Registro guardado exitosamente!');

            // Reset fields after submission
            $this->reset([
                'uniforme',
                'higiene',
                'salud',
                'objetos',
                'observaciones',
                'correccion',
            ]);
            $this->dispatch('actualizar_tabla_lista-higiene-personal');
            $this->closeModal();
        } catch (\Throwable $th) {

            Toaster::error('Fallo al momento de registrar: ' . $th->getMessage());
        }
    }
}
