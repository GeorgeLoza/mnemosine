<?php

namespace App\Livewire\Mantenimiento\DiarioMaquina;

use App\Models\MaquinaEquipo;
use App\Models\RevisionDiariaMaquina;
use Carbon\Carbon;
use Livewire\Attributes\On;
use Livewire\Component;

class Tabla extends Component
{
    public $dates;

    public function mount()
    {
        // Generar las fechas de los últimos 7 días
        $this->dates = collect(range(0, 6))->map(fn($i) => Carbon::today()->subDays($i)->toDateString());
    }
    #[On('revision_diaria')]
    public function render()
    {
        // Obtener todas las máquinas únicas
        $maquinas = MaquinaEquipo::all();

        // Construir el reporte
        $maquinaData = $maquinas->map(function ($maquina) {
            $counts = [];
            foreach ($this->dates as $date) {
                $revision = RevisionDiariaMaquina::where('maquina_equipo_id', $maquina->id)
                    ->whereDate('tiempo', $date)
                    ->first();

                $counts[$date] = $revision ? $revision->estado : null; // 'bien', 'mal' o null
            }
            return [
                'maquina' => $maquina,
                'data' => $counts,
            ];
        });

        return view('livewire.mantenimiento.diario-maquina.tabla', [
            'maquinas' => $maquinaData,
            'dates' => $this->dates,
        ]);
    }    
    
}
