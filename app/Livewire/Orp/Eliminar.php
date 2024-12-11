<?php

namespace App\Livewire\Orp;

use App\Models\Orp;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class Eliminar extends ModalComponent
{
    public $id;
    public function render()
    {
        return view('livewire.orp.eliminar');
    }
    public function delete()
    {
        try {
            Orp::find($this->id)->delete();
            $this->dispatch('actualizar_tabla_orps');
            $this->closeModal();
            $this->dispatch('success', mensaje: 'Se Elimino el parametro exitosamente');
        } catch (\Throwable $th) {
            $this->dispatch('error_mensaje', mensaje: 'Error'. $th);
        }
    }
}
