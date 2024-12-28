<?php

namespace App\Livewire\Produccion\Fermentacion;

use App\Models\Fermentacion;
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
    public $numero_camara;
    public $hora_inicio;
    public $humedad;
    public $temperatura;
    public $hora_salida;
    public $observaciones;
    public $correccion;


    public $trabajador_id;
    public $preparacion;
    public $codigo;
    public $nombre;
    public $user;
    
    protected $rules = [
        'preparacion' => 'required',
        'numero_camara' => 'required',
        'hora_inicio' => 'required',
        'humedad' => 'required',
        'temperatura' => 'required',
        'hora_salida' => 'required',
    ];


    public function mount()
    {
        $lote = Orp::where('id', $this->orp)->value('lote'); // Obtiene directamente el valor del campo 'lote'

        $this->preparaciones = $this->generarOpciones($lote); // Generar las opciones
    }

    public function updatedCodigo()
    {
        // Buscar el usuario por el código
        $this->user = User::where('codigo', $this->codigo)->first();

        // Si se encuentra el usuario, establecer el nombre; si no, dejar el campo vacío
        $this->nombre = $this->user ? $this->user->name . " " . $this->user->lastname : null;
        $this->trabajador_id = $this->user ? $this->user->id : null;
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
        return view('livewire.produccion.fermentacion.crear');
    }

    public function submit()
    {

        $this->validate();
        try {
            Fermentacion::create([
                'tiempo' => Carbon::now(),
                'preparacion' => $this->preparacion,
                'orp_id' => $this->orp,
                'numero_camara' => $this->numero_camara,
                'hora_inicio' => $this->hora_inicio,
                'humedad' => $this->humedad,
                'temperatura' => $this->temperatura,
                'hora_salida' => $this->hora_salida,
                'responsable' => $this->user->id,
                'user_id' => auth()->user()->id,
                'observaciones' => $this->observaciones,
                'correccion' => $this->correccion,
            ]);
            $this->dispatch('reporte');
            $this->closeModal();
            Toaster::success('Registro guardado exitosamente!');

            // Reset fields after submission
            $this->reset([
                'preparacion',
                'numero_camara',
                'hora_inicio',
                'humedad',
                'temperatura',
                'hora_salida',
                'responsable',
                'observaciones',
                'correccion',
            ]);
        } catch (\Throwable $th) {
            Toaster::error('Fallo al momento de registrar: ' . $th->getMessage());
        }
    }
}
