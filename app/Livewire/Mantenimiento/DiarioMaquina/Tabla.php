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
        $this->dates = collect(range(0, 6))
            ->map(fn($i) => Carbon::today()->subDays($i)->toDateString())
            ->reverse();  // Ordenar de más reciente a más antiguo
    }

    #[On('revision_diaria')]
    public function render()
    {
        $maquinas = MaquinaEquipo::all();

        $maquinaData = $maquinas->map(function ($maquina) {
            $dataPorFecha = [];
            
            foreach ($this->dates as $date) {
                // Obtener TODAS las revisiones de la fecha
                $revisiones = RevisionDiariaMaquina::where([
                    ['maquina_equipo_id', $maquina->id],
                    ['tiempo', '>=', Carbon::parse($date)->startOfDay()],
                    ['tiempo', '<=', Carbon::parse($date)->endOfDay()]
                ])->get();

                $dataPorFecha[$date] = $revisiones->isEmpty() ? null : $revisiones;
            }

            return [
                'maquina' => $maquina,
                'data' => $dataPorFecha,
            ];
        });

        return view('livewire.mantenimiento.diario-maquina.tabla', [
            'maquinas' => $maquinaData,
            'dates' => $this->dates,
        ]);
    }
}