<?php

namespace App\Livewire\Produccion\Metal;

use App\Models\Metal;
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
    
    public $ferroso;
    public $no_ferroso;
    public $sus_inox;
    public $observaciones;
    public $correccion;


    public $trabajador_id;
    public $preparacion;
    public $codigo;
    public $nombre;
    public $user;
    
    protected $rules = [
        'preparacion' => 'required',
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

        // Generar todas las opciones basadas en el lote
        for ($i = 1; $i <= $entero; $i++) {
            $opciones[] = $i;
        }

        // Agregar la parte decimal si existe
        if ($decimal > 0) {
            $opciones[] = round($decimal, 2);
        }

        // Obtener las preparaciones usadas en la tabla Corte para esta ORP
        $preparacionesUsadas = Metal::where('orp_id', $this->orp)
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
        return view('livewire.produccion.metal.crear');
    }
    public function submit()
    {

        $this->validate();
        try {
            Metal::create([
                'tiempo' => Carbon::now(),
                'preparacion' => $this->preparacion,
                'orp_id' => $this->orp,
                'ferroso' => $this->ferroso,
                'no_ferroso' => $this->no_ferroso,
                'sus_inox' => $this->sus_inox,
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
                'observaciones',
                'correccion',
            ]);
        } catch (\Throwable $th) {
            
            Toaster::error('Fallo al momento de registrar: ' . $th->getMessage());
        }
    }
}
