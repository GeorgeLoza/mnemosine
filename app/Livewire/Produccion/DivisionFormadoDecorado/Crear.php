<?php

namespace App\Livewire\Produccion\DivisionFormadoDecorado;

use App\Models\DivisionFormadoDecorado;
use App\Models\Orp;
use App\Models\User;
use Carbon\Carbon;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;
use Masmerise\Toaster\Toaster;

class Crear extends ModalComponent
{
    public $orp;
    public $preparaciones;
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
        'peso_crudo1' => 'required',
        'peso_crudo2' => 'required',
        'peso_crudo3' => 'required',
        'peso_crudo4' => 'required',
        'peso_ajonjoli1' => 'required',
        'peso_ajonjoli2' => 'required',
        'peso_ajonjoli3' => 'required',
        'peso_ajonjoli4' => 'required',
    ];

    public function mount()
    {
        
        $lote = Orp::where('id', $this->orp)->value('lote'); // Obtiene directamente el valor del campo 'lote'

        $this->preparaciones = $this->generarOpciones($lote); // Generar las opciones
    }
    public function updated($propertyName)
    {
        $this->peso_crudo_prom = ($this->peso_crudo1 + $this->peso_crudo2 + $this->peso_crudo3 + $this->peso_crudo4) / 4;
        $this->peso_ajonjoli_prom = ($this->peso_ajonjoli1 + $this->peso_ajonjoli2 + $this->peso_ajonjoli3 + $this->peso_ajonjoli4) / 4;
    }
    public function updatedCodigo1()
    {
        // Buscar el usuario por el código
        $this->user1 = User::where('codigo', $this->codigo1)->first();

        // Si se encuentra el usuario, establecer el nombre; si no, dejar el campo vacío
        $this->nombre1 = $this->user1 ? $this->user1->name . " " . $this->user1->lastname : null;
        $this->trabajador_id1 = $this->user1 ? $this->user1->id : null;
    }
    public function updatedCodigo2()
    {
        // Buscar el usuario por el código
        $this->user2 = User::where('codigo', $this->codigo2)->first();

        // Si se encuentra el usuario, establecer el nombre; si no, dejar el campo vacío
        $this->nombre2 = $this->user2 ? $this->user2->name . " " . $this->user2->lastname : null;
        $this->trabajador_id2 = $this->user2 ? $this->user2->id : null;
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
            DivisionFormadoDecorado::create([
                'tiempo' => Carbon::now(),
                'preparacion' => $this->preparacion,
                'orp_id' => $this->orp,
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
                'responsable_pintado' => $this->user1->id,
                'responsable_decorado' => $this->user2->id,
                'user_id' => auth()->user()->id,
                'observaciones' => $this->observaciones,
                'correccion' => $this->correccion,
            ]);
            $this->closeModal();
            Toaster::success('Registro guardado exitosamente!');

            // Reset fields after submission
            $this->reset([
                'preparacion',
                'peso_crudo1',
                'peso_crudo2',
                'peso_crudo3',
                'peso_crudo4',
                'peso_ajonjoli1',
                'peso_ajonjoli2',
                'peso_ajonjoli3',
                'peso_ajonjoli4',
                'centreado',
                'uniformidad',
                'homogeneidad',
                'observaciones',
                'correccion',
            ]);
        } catch (\Throwable $th) {
            
            Toaster::error('Fallo al momento de registrar: ' . $th->getMessage());
        }
    }
}
