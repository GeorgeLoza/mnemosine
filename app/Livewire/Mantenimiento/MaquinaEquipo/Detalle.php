<?php

namespace App\Livewire\Mantenimiento\MaquinaEquipo;

use Illuminate\Support\Facades\Schema;
use App\Models\MaquinaEquipo;
use Livewire\Component;

class Detalle extends Component
{
    public $maquinaId;
    public $maquina;
    public $mantenimientosDia = [];
    public $mantenimientosSemestral = [];
    public $mantenimientosAnual = [];


    public function mount($maquinaId)
    {
        $this->maquinaId = $maquinaId;
        $this->maquina = MaquinaEquipo::find($this->maquinaId);

        if ($this->maquina) {
            // Obtener los nombres de las columnas
            $columns = Schema::getColumnListing('maquina_equipos');

            // Clasificar las columnas por tipo de mantenimiento y obtener sus valores
            $this->mantenimientosDia = $this->filtrarValores($columns, '_dia');
            $this->mantenimientosSemestral = $this->filtrarValores($columns, '_semestral');
            $this->mantenimientosAnual = $this->filtrarValores($columns, '_anual');
        }
    }

    private function filtrarValores($columns, $suffix)
    {
        return collect($columns)
            ->filter(fn($col) => str_contains($col, $suffix))
            ->mapWithKeys(fn($col) => [$col => $this->maquina->$col])
            ->toArray();
    }
    public function render()
    {
        
        
        return view('livewire.mantenimiento.maquina-equipo.detalle');
    }
}
