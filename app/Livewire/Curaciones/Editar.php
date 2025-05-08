<?php

namespace App\Livewire\Curaciones;

use App\Models\Curacion;
use App\Models\User;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;
use Masmerise\Toaster\Toaster;

class Editar extends ModalComponent
{
    public $curacionId;
    public $trabajador_id;
    public $codigo;
    public $nombre;
    public $detalle;
    public $esparatrapo;
    public $guante;
    public $observaciones;

    protected $rules = [
        'trabajador_id' => 'required|exists:users,id',
        'detalle' => 'required',
    ];

    public function mount($curacionId)
    {
        $this->curacionId = $curacionId;
        $curacion = Curacion::findOrFail($curacionId);
        
        $this->codigo = $curacion->trabajador->codigo;
        $this->nombre = $curacion->trabajador->name . ' ' . $curacion->trabajador->lastname;
        $this->trabajador_id = $curacion->trabajador_id;
        $this->detalle = $curacion->detalle;
        $this->esparatrapo = $curacion->esparatrapo;
        $this->guante = $curacion->guante;
        $this->observaciones = $curacion->observaciones;
    }

    public function updatedCodigo()
    {
        $user = User    ::where('codigo', $this->codigo)->first();
        $this->nombre = $user ? $user->name . ' ' . $user->lastname : null;
        $this->trabajador_id = $user ? $user->id : null;
    }

    public function render()
    {
        return view('livewire.curaciones.editar');
    }

    public function submit()
    {
        $this->validate();

        try {
            $curacion = Curacion::findOrFail($this->curacionId);
            $curacion->update([
                'trabajador_id' => $this->trabajador_id,
                'detalle' => $this->detalle,
                'esparatrapo' => $this->esparatrapo,
                'guante' => $this->guante,
                'observaciones' => $this->observaciones,
            ]);

            $this->dispatch('curacionActualizada');
            $this->closeModal();
            Toaster::success('Registro actualizado exitosamente!');
        } catch (\Throwable $th) {
            Toaster::error('Error al actualizar: ' . $th->getMessage());
        }
    }
    public function cerrar()
    {
        $this->closeModal();
    }    
}
