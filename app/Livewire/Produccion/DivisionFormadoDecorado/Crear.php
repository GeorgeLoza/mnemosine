<?php

namespace App\Livewire\Produccion\DivisionFormadoDecorado;

use App\Models\Orp;
use App\Models\User;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class Crear extends ModalComponent
{
    public $orp;
    public $preparaciones;
    public $peso_crudo1;
    public $peso_crudo2;
    public $peso_crudo3;
    public $peso_crudo4;
    public $peso_ajonjoli1;
    public $peso_ajonjoli2;
    public $peso_ajonjoli3;
    public $peso_ajonjoli4;
    public $centreado;
    public $uniformidad;
    public $homogeneidad;


    public $observaciones;
    public $correccion;


    public $preparacion;

    public $trabajador_id1;
    public $codigo1;
    public $nombre1;
    public $trabajador_id2;
    public $codigo2;
    public $nombre2;

    public $user1;
    public $user2;

    protected $rules = [
        'preparacion' => 'required',
        'tiempo_amasado1' => 'required',
        'tiempo_amasado2' => 'required',
        'temperatura' => 'required',
    ];

    public function mount()
    {
        $lote = Orp::where('id', $this->orp)->value('lote'); // Obtiene directamente el valor del campo 'lote'

        $this->preparaciones = $this->generarOpciones($lote); // Generar las opciones
    }
    public function updatedCodigo1()
    {
        // Buscar el usuario por el código
        $this->user1 = User::where('codigo', $this->codigo1)->first();

        // Si se encuentra el usuario, establecer el nombre; si no, dejar el campo vacío
        $this->nombre1 = $this->user ? $this->user->name . " " . $this->user->lastname : null;
        $this->trabajador_id1 = $this->user ? $this->user->id : null;
    }
    public function updatedCodigo2()
    {
        // Buscar el usuario por el código
        $this->user2 = User::where('codigo', $this->codigo2)->first();

        // Si se encuentra el usuario, establecer el nombre; si no, dejar el campo vacío
        $this->nombre2 = $this->user ? $this->user->name . " " . $this->user->lastname : null;
        $this->trabajador_id2 = $this->user ? $this->user->id : null;
    }

    private function generarOpciones($lote)
    {
        $opciones = [];
        $entero = floor($lote);
        $decimal = $lote - $entero;

        // Generar las opciones basadas en la parte entera
        for ($i = 1; $i <= $entero; $i++) {
            $opciones[] = $i;
        }

        // Agregar la parte decimal si existe
        if ($decimal > 0) {
            $opciones[] = round($decimal, 2);
        }

        return $opciones;
    }

    public function render()
    {
        return view('livewire.produccion.division-formado-decorado.crear');
    }
    public function submit()
    {

        $this->validate();
        try {
            Amasado::create([
                'tiempo' => Carbon::now(),
                'preparacion' => $this->preparacion,
                'orp_id' => $this->orp,
                'tiempo_amasado1' => $this->tiempo_amasado1,
                'tiempo_amasado2' => $this->tiempo_amasado2,
                'temperatura' => $this->temperatura,
                'responsable' => $this->user->id,
                'user_id' => auth()->user()->id,
                'observaciones' => $this->observaciones,
                'correccion' => $this->correccion,
            ]);
            $this->closeModal();
            Toaster::success('Registro guardado exitosamente!');

            // Reset fields after submission
            $this->reset([
                'preparacion',
                'tiempo_amasado1',
                'tiempo_amasado2',
                'temperatura',
                'responsable',
                'observaciones',
                'correccion',
            ]);
        } catch (\Throwable $th) {
            dd($th);
            Toaster::error('Fallo al momento de registrar: ' . $th->getMessage());
        }
    }
}
