<?php

namespace App\Livewire\VerificacionOrdenLimpieza;

use Livewire\Component;
use App\Models\OrdenLimpieza;
use App\Models\VerificacionOrdenLimpieza;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\App;

class Reporte extends Component
{
    public $startDate;
    public $endDate;
    public $selectedArea = '';
    public $selectedResponsable = '';

    protected $casts = [
        'tiempo' => 'datetime'
    ];

    public function mount()
    {
        $this->startDate = now()->subWeek()->format('Y-m-d');
        $this->endDate = now()->format('Y-m-d');
    }

    private function adjustDate(Carbon $date)
    {
        if ($date->hour < 6 || ($date->hour == 6 && $date->minute == 0)) {
            return $date->copy()->subDay();
        }
        return $date->copy();
    }

    public function render()
    {
        $start = Carbon::parse($this->startDate)->startOfDay();
        $end = Carbon::parse($this->endDate)->endOfDay();

        // Obtener órdenes con filtros
        $ordenes = OrdenLimpieza::with(['verificaciones' => function ($query) use ($start, $end) {
            $query->whereBetween('tiempo', [$start, $end]);
        }])
            ->when($this->selectedArea, fn($q) => $q->where('area', $this->selectedArea))
            ->when($this->selectedResponsable, fn($q) => $q->where('responsable', $this->selectedResponsable))
            ->get()
            ->groupBy('periodo');

        // Obtener opciones para filtros
        $areas = OrdenLimpieza::distinct()->pluck('area');
        $responsables = OrdenLimpieza::distinct()->pluck('responsable');

        // Generar rangos
        $diarioRange = $this->generateDateRange($start, $end);
        $semanalRange = $this->generateWeekRange($start, $end);
        $mensualRange = $this->generateMonthRange($start, $end);

        // Procesar datos
        $reportes = [
            'diario' => $this->procesarPeriodo($ordenes->get('Diario', collect()), $diarioRange, 'daily'),
            'semanal' => $this->procesarPeriodo($ordenes->get('Semanal', collect()), $semanalRange, 'weekly'),
            'mensual' => $this->procesarPeriodo($ordenes->get('Mensual', collect()), $mensualRange, 'monthly'),
        ];

        return view('livewire.verificacion-orden-limpieza.reporte', compact('reportes', 'diarioRange', 'semanalRange', 'mensualRange', 'areas', 'responsables'));
    }

    // Métodos para generar rangos de fechas
    private function generateDateRange($start, $end): Collection
    {
        $startDate = Carbon::parse($start)->startOfDay();
        $endDate = Carbon::parse($end)->endOfDay();

        $earliestAdjusted = $this->adjustDate($startDate);
        $latestAdjusted = $this->adjustDate($endDate);

        $dates = collect();
        $current = $earliestAdjusted->copy();

        while ($current <= $latestAdjusted) {
            $dates->push($current->copy());
            $current->addDay();
        }

        return $dates;
    }

    private function generateWeekRange($start, $end): Collection
    {
        
        $weeks = collect();
        $current = $start->copy()->startOfWeek();
        while ($current <= $end) {
            $weeks->push([
                'start' => $current->copy()->startOfWeek(),
                'end' => $current->copy()->endOfWeek(),
                'label' => $current->format('W/Y')
            ]);
            $current->addWeek();
        }
        return $weeks;
    }

    private function generateMonthRange($start, $end): Collection
    {
        Carbon::setLocale('es');

        $months = collect();
        $current = $start->copy()->startOfMonth();
        while ($current <= $end) {
            $months->push([
                'start' => $current->copy()->startOfMonth(),
                'end' => $current->copy()->endOfMonth(),
                'label' => ucfirst($start->translatedFormat('F Y'))
            ]);
            $current->addMonth();
        }
        return $months;
    }

    private function procesarPeriodo($ordenes, $rango, $tipo)
    {
        return $ordenes->map(function ($orden) use ($rango, $tipo) {
            $registros = [];

            foreach ($rango as $periodo) {
                if ($tipo === 'daily') {
                    $count = $orden->verificaciones->filter(function ($verificacion) use ($periodo) {
                        $verificacionTime = Carbon::parse($verificacion->tiempo);
                        $adjustedDate = $this->adjustDate($verificacionTime);
                        return $adjustedDate->isSameDay($periodo);
                    })->count();
                    $label = $periodo->format('d/m');
                } else {
                    $start = $periodo['start'];
                    $end = $periodo['end'];

                    $count = $orden->verificaciones->filter(function ($verificacion) use ($start, $end) {
                        return Carbon::parse($verificacion->tiempo)->between($start, $end);
                    })->count();

                    $label = $tipo === 'weekly' ? "Sem. {$periodo['label']}" : $periodo['label'];
                }

                $registros[] = [
                    'count' => $count,
                    'label' => $label
                ];
            }

            return [
                'orden' => $orden,
                'registros' => $registros
            ];
        });
    }

    public function pdf()
    {
        return response()->streamDownload(
            function () {
                
                Carbon::setLocale('es');
                App::setLocale('es');
                // Obtener datos (similar al método render())
                $start = Carbon::parse($this->startDate)->startOfDay();
                $end = Carbon::parse($this->endDate)->endOfDay();

                $ordenes = OrdenLimpieza::with(['verificaciones' => function ($query) use ($start, $end) {
                    $query->whereBetween('tiempo', [$start, $end]);
                }])
                    ->when($this->selectedArea, fn($q) => $q->where('area', $this->selectedArea))
                    ->when($this->selectedResponsable, fn($q) => $q->where('responsable', $this->selectedResponsable))
                    ->get()
                    ->groupBy('periodo');

                // Generar rangos
                $diarioRange = $this->generateDateRange($start, $end);
                $semanalRange = $this->generateWeekRange($start, $end);
                $mensualRange = $this->generateMonthRange($start, $end);

                // Procesar datos
                $reportes = [
                    'diario' => $this->procesarPeriodo($ordenes->get('Diario', collect()), $diarioRange, 'daily'),
                    'semanal' => $this->procesarPeriodo($ordenes->get('Semanal', collect()), $semanalRange, 'weekly'),
                    'mensual' => $this->procesarPeriodo($ordenes->get('Mensual', collect()), $mensualRange, 'monthly'),
                ];

                // Generar PDF
                $pdf = Pdf::loadView('pdf.reportes.ordenLimpieza', [
                    'reportes' => $reportes,
                    'diarioRange' => $diarioRange,
                    'semanalRange' => $semanalRange,
                    'mensualRange' => $mensualRange,
                    'startDate' => $this->startDate,
                    'endDate' => $this->endDate
                ])->setPaper('letter', 'landscape');

                echo $pdf->stream();
            },
            "ReporteOrdenLimpieza.pdf"
        );
    }
}
