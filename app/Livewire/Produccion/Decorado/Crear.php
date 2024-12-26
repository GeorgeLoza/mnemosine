<?php

namespace App\Livewire\Produccion\Decorado;

use App\Models\Amasado;
use App\Models\Decorado;
use App\Models\User;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\Mechanisms\HandleComponents\Synthesizers\CarbonSynth;
use LivewireUI\Modal\ModalComponent;
use Masmerise\Toaster\Toaster;

class Crear extends ModalComponent
{
    public $orp;

    /*inputs */
    public $trabajador_id;
    public $codigo;
    public $nombre;
    /*amasado */
    public $huevo;
    public $semilla;
    public $polenta;

    public function updatedCodigo()
    {
        // Buscar el usuario por el código
        $user = User::where('codigo', $this->codigo)->first();

        // Si se encuentra el usuario, establecer el nombre; si no, dejar el campo vacío
        $this->nombre = $user ? $user->name . " " . $user->lastname : null;
        $this->trabajador_id = $user ? $user->id : null;
    }

    public function mount($etapa = null, $orp)
    {
        $this->orp = $orp;
    }
    public function render()
    {
        return view('livewire.produccion.decorado.crear');
    }
    public function submit(){
        try {
            Decorado::create([
                'orp_id' => $this->orp,
                'tiempo' => Carbon::now(),
                'user_id' => auth()->user()->id,
                'responsable' => $this->trabajador_id,
                'huevo' => $this->huevo,
                'semilla' => $this->semilla,
                'polenta' => $this->polenta,

            ]);

            Toaster::success('Registro guardado exitosamente!');

            // Reset fields after submission
            $this->reset([
                'huevo',
                'semilla',
                'polenta',

            ]);
        } catch (\Throwable $th) {

            Toaster::error('Fallo al momento de registrar: ' . $th->getMessage());
        }
    }
}
