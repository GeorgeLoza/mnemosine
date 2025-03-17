<?php

namespace App\Livewire\LavadoMano;

use Livewire\Component;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

use Barryvdh\DomPDF\Facade\Pdf;

use Illuminate\Support\Facades\App;

class Reporte extends Component
{

    public $dates;

    public function mount()
    {
        // Generar los últimos 5 días incluyendo hoy
        $this->dates = collect(range(0, 6))->map(fn($i) => Carbon::today()->subDays($i)->toDateString());
    }

    public function render()
    {
        // Obtener las fechas de los últimos 5 días
        $this->dates = collect(range(0, 6))->map(fn($i) => Carbon::today()->subDays($i)->toDateString());

        // Consultar usuarios con conteo de registros por fecha
        $users = User::with('lavadoManos')->whereNot('rol', 'Inhabilitado')->orderBy('lastname', 'asc')->get();

        $userData = $users->map(function ($user) {
            $counts = [];
            foreach ($this->dates as $date) {
                $counts[$date] = $user->lavadoManos()
                    ->whereDate('created_at', $date)
                    ->count();
            }
            return [
                'user' => $user,
                'data' => $counts,
            ];
        });

        return view('livewire.lavado-mano.reporte', [
            'users' => $userData,
            'dates' => $this->dates,
        ]);
    }


    public function pdf()
    {

        return response()->streamDownload(
            function () {
                // Obtener las fechas de los últimos 5 días
                $this->dates = collect(range(0, 6))->map(fn($i) => Carbon::today()->subDays($i)->toDateString());

                // Consultar usuarios con conteo de registros por fecha
                $users = User::with('lavadoManos')->whereNot('rol', 'Inhabilitado')->orderBy('lastname', 'asc')->get();

                $userData = $users->map(function ($user) {
                    $counts = [];
                    foreach ($this->dates as $date) {
                        $counts[$date] = $user->lavadoManos()
                            ->whereDate('created_at', $date)
                            ->count();
                    }
                    return [
                        'user' => $user,
                        'data' => $counts,
                    ];
                });

                    $users = $userData;
                    $dates = $this->dates;
                ;
                $pdf = App::make('dompdf.wrapper');
                $pdf = Pdf::loadView('pdf.reportes.lavadoManos', compact(['users', 'dates']));
                $pdf->setPaper('letter', 'landscape');

                echo $pdf->stream();
            },
            "ReporteLavadoManos.pdf"
        );
    }
}
