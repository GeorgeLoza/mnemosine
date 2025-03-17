<?php

namespace App\Livewire\VerificacionOrdenLimpieza;

use Livewire\Component;
use App\Models\OrdenLimpieza;
use Carbon\Carbon;

class Reporte extends Component
{
    public $filtro = 'todos'; // Filtro: todos, si, no

    // Obtener períodos configurados
    public function getPeriodosProperty()
    {
        return [
            'diario' => Carbon::today(),
            'semanal' => [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()],
            'mensual' => [Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth()]
        ];
    }

    // Lógica principal del reporte
    public function generarReporte()
    {
        $ordenes = OrdenLimpieza::with('verificaciones')->get();
        $reporte = [];

        foreach ($ordenes as $orden) {
            $reporte[] = [
                'id' => $orden->id,
                'area' => $orden->area,
                'responsable' => $orden->responsable,
                'diario' => $this->verificarPeriodo($orden, 'diario'),
                'semanal' => $this->verificarPeriodo($orden, 'semanal'),
                'mensual' => $this->verificarPeriodo($orden, 'mensual')
            ];
        }

        return $reporte;
    }

    // Verificar existencia en período
    private function verificarPeriodo($orden, $periodo)
    {
        return $orden->verificaciones->contains(function ($verificacion) use ($periodo) {
            $fecha = Carbon::parse($verificacion->tiempo);
            
            return match($periodo) {
                'diario' => $fecha->isToday(),
                'semanal' => $fecha->isBetween($this->periodos['semanal'][0], $this->periodos['semanal'][1]),
                'mensual' => $fecha->isBetween($this->periodos['mensual'][0], $this->periodos['mensual'][1])
            };
        }) ? 'SI' : 'NO';
    }

    // Aplicar filtros
    private function aplicarFiltro($reporte)
    {
        return collect($reporte)->filter(function ($item) {
            return $this->filtro === 'todos' ||
                   ($this->filtro === 'si' && ($item['diario'] === 'SI' || $item['semanal'] === 'SI' || $item['mensual'] === 'SI')) ||
                   ($this->filtro === 'no' && ($item['diario'] === 'NO' && $item['semanal'] === 'NO' && $item['mensual'] === 'NO'));
        })->groupBy('area');
    }

    public function render()
    {
        $reporte = $this->generarReporte();
        $datosFiltrados = $this->aplicarFiltro($reporte);

        return view('livewire.verificacion-orden-limpieza.reporte', [
            'datos' => $datosFiltrados,
            'periodos' => array_keys($this->periodos)
        ]);
    }
}