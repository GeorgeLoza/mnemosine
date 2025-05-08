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
    public $selectedDate;
    
    public $sector;

    public function mount()
    {
        // Generar los últimos 5 días incluyendo hoy
        $this->selectedDate = Carbon::today()->toDateString(); // Fecha inicial hoy
    }

    public function render()
{
    // Si hay fecha seleccionada, solo esa fecha, si no, los últimos 7 días
    $this->dates = $this->selectedDate
        ? [Carbon::parse($this->selectedDate)->toDateString()]
        : collect(range(0, 6))->map(fn($i) => Carbon::today()->subDays($i)->toDateString());

    $query = User::query()->orderBy('lastname', 'asc')->whereNot('rol', 'Inhabilitado')->whereNot('rol', 'Admi')
    ->whereNot('rol', 'Visor')
    ->whereNot('rol', 'Administracion');

    if ($this->sector && $this->sector != 'Almacenes') {
        $query->whereNot('turno', 'Almacenes');
    }

    if ($this->sector && $this->sector == 'Almacenes') {
        $query->where('turno', 'Almacenes');
    }

    $users = $query->get();

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
                    
                $this->dates = $this->selectedDate
                ? [Carbon::parse($this->selectedDate)->toDateString()]
                : collect(range(0, 6))->map(fn($i) => Carbon::today()->subDays($i)->toDateString());
            
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
