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
    public $uniforme;
    public $higiene;
    public $salud;
    public $objetos;
    public $observaciones;
    public $correccion;
    public $user;

    protected $rules = [
        'observaciones' => 'required',
        'correccion' => 'required',
    ];

    public function mount()
    {
        $this->user = User::find($this->id);
    }

    public function submit()
    {
        $this->validate();
        
        HigienePersonal::create([
            'supervisor_id' => auth()->id(),
            'trabajador_id' => $this->id,
            'tiempo' => now(),
            'uniforme' => (bool)$this->uniforme,
            'higiene' => (bool)$this->higiene,
            'salud' => (bool)$this->salud,
            'objetos_extranos' => (bool)$this->objetos,
            'observaciones' => $this->observaciones,
            'correccion' => $this->correccion,
        ]);

        Toaster::success('Registro guardado exitosamente!');
        $this->dispatch('actualizar_tabla_lista-higiene-personal');
        $this->closeModal();
    }

    public function render()
    {
        return view('livewire.higiene-personal.lista-crear');
    }
}