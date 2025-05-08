<?php

namespace App\Livewire\Evacuacion;

use Livewire\Component;
use App\Models\Evacuacion;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\App;

class Reporte extends Component
{
    public $fechaInicio;
    public $fechaFin;

    public function mount()
    {
        $this->fechaInicio = Carbon::now()->startOfMonth()->format('Y-m-d');
        $this->fechaFin = Carbon::now()->endOfMonth()->format('Y-m-d');
    }

    private function adjustDate($timestamp)
    {
        $date = Carbon::parse($timestamp);
        if ($date->format('H:i') < '06:00') {
            return $date->subDay()->format('Y-m-d');
        }
        return $date->format('Y-m-d');
    }

    private function getReportData()
    {
        $columnsToCheck = [
            'zunino', 'molde', 'hiline', 'reposteria', 'bk', 'grissin', 
            'hornos', 'codificado', 'embolsado_t1', 'embolsado_t2', 
            'embolsado_pan_molde', 'embolsado_bk', 'embolsado_reposteria', 
            'embolsado_grissin',
        ];

        $evacuaciones = Evacuacion::whereBetween('tiempo', [
            Carbon::parse($this->fechaInicio)->startOfDay(),
            Carbon::parse($this->fechaFin)->endOfDay()
        ])->get();

        $grouped = $evacuaciones->groupBy(function ($item) {
            return $this->adjustDate($item->tiempo);
        });

        $reporte = [];

        foreach ($grouped as $fecha => $registros) {
            $fila = ['fecha' => $fecha];
            foreach ($columnsToCheck as $col) {
                $fila[$col] = '-';
            }

            foreach ($registros as $registro) {
                foreach ($columnsToCheck as $col) {
                    if (!is_null($registro->$col)) {
                        $fila[$col] = '✔️';
                    }
                }
            }

            $allNo = true;
            foreach ($columnsToCheck as $col) {
                if ($fila[$col] === '✔️') {
                    $allNo = false;
                    break;
                }
            }

            if ($allNo) {
                foreach ($columnsToCheck as $col) {
                    $fila[$col] = 'NULL';
                }
            }

            $reporte[] = $fila;
        }

        usort($reporte, function ($a, $b) {
            return strcmp($b['fecha'], $a['fecha']);
        });

        return $reporte;
    }

    public function render()
    {
        return view('livewire.evacuacion.reporte', [
            'reporte' => $this->getReportData()
        ]);
    }

    public function pdf()
    {
        $reporte = $this->getReportData();

        return response()->streamDownload(
            function () use ($reporte) {
                $pdf = Pdf::loadView('pdf.reportes.evacuacion', compact('reporte'))
                    ->setPaper('letter', 'landscape');
                echo $pdf->stream();
            },
            "ReporteEvacuacionResiduos.pdf"
        );
    }
}