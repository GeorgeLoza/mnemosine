<?php

namespace App\Livewire\Produccion\Balance;

use App\Models\Balance;
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

    public $cantidad;
    public $observaciones;
    public $correccion;

    public $preparacion;
    
    protected $rules = [
        'preparacion' => 'required',
        'cantidad' => 'required',
    ];
    public function mount()
    {
        $lote = Orp::where('id', $this->orp)->value('lote'); // Obtiene directamente el valor del campo 'lote'

        $this->preparaciones = $this->generarOpciones($lote); // Generar las opciones
    }


    private function generarOpciones($lote)
    {
        $opciones = [];
        $entero = floor($lote);
        $decimal = $lote - $entero;

        // Generar todas las opciones basadas en el lote
        for ($i = 1; $i <= $entero; $i++) {
            $opciones[] = $i;
        }

        // Agregar la parte decimal si existe
        if ($decimal > 0) {
            $opciones[] = round($decimal, 2);
        }

        // Obtener las preparaciones usadas en la tabla Corte para esta ORP
        $preparacionesUsadas = Balance::where('orp_id', $this->orp)
            ->pluck('preparacion') // Extrae solo las preparaciones
            ->map(function ($valor) {
                return (float) $valor; // Convertir a float para comparación
            })
            ->toArray();

        // Filtrar las opciones para excluir las usadas
        $opcionesFiltradas = array_filter($opciones, function ($opcion) use ($preparacionesUsadas) {
            return !in_array((float) $opcion, $preparacionesUsadas); // Comparar como float
        });

        return $opcionesFiltradas;
    }


    public function render()
    {
        return view('livewire.produccion.balance.crear');
    }

    
    public function submit()
    {

        $this->validate();
        try {
            Balance::create([
                'tiempo' => Carbon::now(),
                'preparacion' => $this->preparacion,
                'orp_id' => $this->orp,
                'cantidad' => $this->cantidad,
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
                'cantidad',
                'observaciones',
                'correccion',
            ]);
        } catch (\Throwable $th) {

                
        }
    }
}
