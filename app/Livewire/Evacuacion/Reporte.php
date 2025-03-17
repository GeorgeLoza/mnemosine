<?php

namespace App\Livewire\Evacuacion;

use Livewire\Component;
use App\Models\Evacuacion;
use Illuminate\Support\Carbon;

class Reporte extends Component
{
    public function render()
    {
        $columnsToCheck = [
            'zunino',
            'molde',
            'hiline',
            'reposteria',
            'bk',
            'grissin',
            'hornos',
            'codificado',
            'embolsado_t1',
            'embolsado_t2',
            'embolsado_pan_molde',
            'embolsado_bk',
            'embolsado_reposteria',
            'embolsado_grissin',
        ];

        $evacuaciones = Evacuacion::all();

        $grouped = $evacuaciones->groupBy(function ($item) {
            return Carbon::parse($item->tiempo)->format('Y-m-d');
        });

        $reporte = [];

        foreach ($grouped as $fecha => $registros) {
            $fila = ['fecha' => $fecha];
            foreach ($columnsToCheck as $col) {
                $fila[$col] = '-'; // Inicializar todas las columnas como NO
            }

            foreach ($registros as $registro) {
                foreach ($columnsToCheck as $col) {
                    if (!is_null($registro->$col)) {
                        $fila[$col] = '✔️'; // Marcar SI si algún registro tiene valor
                    }
                }
            }

            // Verificar si todas las columnas son NO
            $allNo = true;
            foreach ($columnsToCheck as $col) {
                if ($fila[$col] === '✔️') {
                    $allNo = false;
                    break;
                }
            }

            // Si todas son NO, cambiar a NULL
            if ($allNo) {
                foreach ($columnsToCheck as $col) {
                    $fila[$col] = 'NULL';
                }
            }

            $reporte[] = $fila;
        }

        // Ordenar por fecha descendente
        usort($reporte, function ($a, $b) {
            return strcmp($b['fecha'], $a['fecha']);
        });

        return view('livewire.evacuacion.reporte', [
            'reporte' => $reporte,
        ]);
    }
}