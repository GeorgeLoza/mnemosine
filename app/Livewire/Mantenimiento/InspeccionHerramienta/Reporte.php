<?php

namespace App\Livewire\Mantenimiento\InspeccionHerramienta;

use App\Models\Herramienta;
use Carbon\Carbon;
use Livewire\Component;

class Reporte extends Component
{
    public $anio;
    public $meses = [];
    public $herramientasConInspecciones = [];

    public function mount()
    {
        $this->anio = date('Y');
        $this->meses = range(1, 12);
    }

    public function render()
    {
        $this->herramientasConInspecciones = Herramienta::with(['inspecciones' => function ($query) {
            $query->whereYear('tiempo', $this->anio)
                ->orderBy('tiempo', 'desc');
        }])->get()->map(function ($herramienta) {
            $inspeccionesPorMes = [];

            foreach ($this->meses as $mes) {
                $inspeccion = $herramienta->inspecciones->first(function ($inspeccion) use ($mes) {
                    // Usar Carbon para parsear la fecha correctamente
                    return Carbon::parse($inspeccion->tiempo)->month == $mes;
                });

                $inspeccionesPorMes[$mes] = $inspeccion ? [
                    'ok' => empty($inspeccion->observaciones),
                    'observaciones' => $inspeccion->observaciones
                ] : null;
            }

            return [
                'herramienta' => $herramienta,
                'inspecciones' => $inspeccionesPorMes
            ];
        });

        return view('livewire.mantenimiento.inspeccion-herramienta.reporte');
    }
}