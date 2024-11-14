<?php

namespace App\Livewire\LavadoMano;

use App\Models\LavadoMano;
use App\Models\User;
use Carbon\Carbon;
use Livewire\Component;
use Masmerise\Toaster\Toaster;

class Crear extends Component
{
    //inputs
    public $codigo;
    public $nombre;
    public $user_id;

    protected $rules = [
        'user_id' => 'required|exists:users,id',
    ];
    public function updatedCodigo()
    {
        // Buscar el usuario por el código
        $user = User::where('codigo', $this->codigo)->first();

        // Si se encuentra el usuario, establecer el nombre; si no, dejar el campo vacío
        $this->nombre = $user ? $user->name . " " . $user->lastname : null;
        $this->user_id = $user ? $user->id : null;
    }


    public function render()
    {
        return view('livewire.lavado-mano.crear');
    }

    public function submit()
    {
        $this->validate();
        try {
            LavadoMano::create([
                'user_id' => $this->user_id,
                'tiempo' => Carbon::now(),
            ]);

            Toaster::success('Registro guardado exitosamente!');

            // Reset fields after submission
            $this->reset([
                'codigo',
                'nombre',
                'user_id',
            ]);
        } catch (\Throwable $th) {
            Toaster::error('Fallo al momento de registrar: ' . $th->getMessage());
        }
    }
}
