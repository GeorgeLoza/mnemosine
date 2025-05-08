<?php

namespace App\Livewire\Curaciones;

use App\Models\Curacion;
use App\Models\User;
use Carbon\Carbon;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;
use Masmerise\Toaster\Toaster;

class Crear extends ModalComponent
{
    /*inputs */
    public $trabajador_id;
    public $codigo;
    public $nombre;

    public $detalle;
    public $esparatrapo = true;
    public $guante = true;
    public $observaciones;

    protected $rules = [
        'trabajador_id' => 'required|exists:users,id',
        'detalle' => 'required',

    ];

    public function updatedCodigo()
    {
        // Buscar el usuario por el código
        $user = User::where('codigo', $this->codigo)->first();

        // Si se encuentra el usuario, establecer el nombre; si no, dejar el campo vacío
        $this->nombre = $user ? $user->name . " " . $user->lastname : null;
        $this->trabajador_id = $user ? $user->id : null;
    }


    public function render()
    {
        return view('livewire.curaciones.crear');
    }
    public function submit()
    {
        $this->validate();
        try {
            Curacion::create([
                'tiempo' => Carbon::now(),
                'trabajador_id' => $this->trabajador_id,
                'detalle' => $this->detalle,
                'esparatrapo' => $this->esparatrapo,
                'guante' => $this->guante,
                'responsable_inicio' => auth()->user()->id,
                'observaciones' => $this->observaciones,
            ]);

            $this->dispatch('curacion');
            $this->closeModal();
            Toaster::success('Registro guardado exitosamente!');
        } catch (\Throwable $th) {
            dd($th);
            Toaster::error('Fallo al momento de registrar: ' . $th->getMessage());
        }
    }
    public function cerrar()
    {
        $this->closeModal();
    }
}
