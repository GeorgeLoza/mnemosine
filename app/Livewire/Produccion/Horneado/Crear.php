<?php

namespace App\Livewire\Produccion\Horneado;

use App\Models\Horneado;
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
    public $verificacion_horno;
    public $nhorno;
    public $tiempo_horneado;
    public $temperatura_nucleo;
    public $temperatura;
    public $observaciones;
    public $correccion;


    public $trabajador_id;
    public $preparacion;
    public $codigo;
    public $nombre;
    public $user;
    
    protected $rules = [
        'preparacion' => 'required',
        'nhorno' => 'required',
        'tiempo_horneado' => 'required',
        'temperatura_nucleo' => 'required',
        'temperatura' => 'required',
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
        return view('livewire.produccion.horneado.crear');
    }

    public function submit()
    {

        $this->validate();
        try {
            Horneado::create([
                'tiempo' => Carbon::now(),
                'preparacion' => $this->preparacion,
                'orp_id' => $this->orp,
                'verificacion_horno' => $this->verificacion_horno,
                'nhorno' => $this->nhorno,
                'tiempo_horneado' => $this->tiempo_horneado,
                'temperatura_nucleo' => $this->temperatura_nucleo,
                'temperatura' => $this->temperatura,
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
                'verificacion_horno',
                'nhorno',
                'tiempo_horneado',
                'humedad',
                'temperatura_nucleo',
                'temperatura',
                'responsable',
                'observaciones',
                'correccion',
            ]);
        } catch (\Throwable $th) {
            Toaster::error('Fallo al momento de registrar: ' . $th->getMessage());
        }
    }
    
}
