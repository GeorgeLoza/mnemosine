<?php

namespace App\Livewire\Mantenimiento\MensualInfrestructura;

use App\Models\MantenimientoInfrestructuras;
use App\Models\RevisionMensual;
use Livewire\Component;

class Reporte extends Component
{
    public $anio;
    public $aniosDisponibles;

    public function mount()
    {
        // Obtener años con revisiones existentes
        $this->aniosDisponibles = RevisionMensual::selectRaw('YEAR(fecha) as year')
            ->distinct()
            ->orderBy('year', 'desc')
            ->pluck('year');
            
        $this->anio = now()->year;
    }

    // En tu componente Livewire
public function getReporteProperty()
{
    return MantenimientoInfrestructuras::with(['revisionesMensuales' => function($query) { // <- Nombre corregido
        $query->whereYear('fecha', $this->anio);
    }])->get()->map(function($infra) {
        $meses = [];
        
        foreach(range(1, 12) as $mes) {
            $revision = $infra->revisionesMensuales->firstWhere('fecha.month', $mes); // <- Nombre corregido
            
            $meses[$mes] = $revision ? 
                ($revision->estado === 'bien' ? '✅' : '⚠️ ' . $revision->observaciones) 
                : '-';
        }
        
        return [
            'subarea' => $infra->subarea,
            'infraestructura' => $infra->infrestructura,
            'meses' => $meses
        ];
    });
}

    public function render()
    {
        return view('livewire.mantenimiento.mensual-infrestructura.reporte', [
            'reporte' => $this->reporte,
            'meses' => [
                1 => 'Enero',
                2 => 'Febrero',
                3 => 'Marzo',
                4 => 'Abril',
                5 => 'Mayo',
                6 => 'Junio',
                7 => 'Julio',
                8 => 'Agosto',
                9 => 'Septiembre',
                10 => 'Octubre',
                11 => 'Noviembre',
                12 => 'Diciembre'
            ]
        ]);
    }
    
}
