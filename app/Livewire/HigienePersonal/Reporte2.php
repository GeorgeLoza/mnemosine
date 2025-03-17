<?php

namespace App\Livewire\HigienePersonal;

use App\Models\HigienePersonal;
use Livewire\Component;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

use Barryvdh\DomPDF\Facade\Pdf;

use Illuminate\Support\Facades\App;

class Reporte2 extends Component
{
    public $selectedDate; // Nueva propiedad para el input de fecha

    public function mount()
    {
        $this->selectedDate = Carbon::today()->toDateString(); // Fecha inicial hoy
    }

    public function render()
    {
        // Determinar las fechas a mostrar
        $dates = $this->selectedDate
            ? [Carbon::parse($this->selectedDate)->toDateString()]
            : collect(range(0, 6))->map(fn($i) => Carbon::today()->subDays($i)->toDateString());

        $users = User::whereNot('rol', 'Inhabilitado')->orderBy('lastname', 'asc')->get();

        $userData = $users->map(function ($user) use ($dates) {
            $counts = [];
            foreach ($dates as $date) {
                $record = HigienePersonal::where('trabajador_id', $user->id)
                    ->whereDate('tiempo', $date)
                    ->first();

                if ($record) {
                    $status = [
                        'uniforme' => $record->uniforme,
                        'higiene' => $record->higiene,
                        'salud' => $record->salud,
                        'objetos_extranos' => $record->objetos_extranos,
                        'observaciones' => $record->observaciones,
                        'correccion' => $record->correccion,
                    ];

                    $hasIssues = collect($status)->except(['observaciones', 'correccion'])->contains(0);

                    $counts[$date] = [
                        'status' => $hasIssues ? 'warning' : 'ok',
                        'details' => $hasIssues ? $status : null,
                    ];
                } else {
                    $counts[$date] = [
                        'status' => 'missing',
                        'details' => null,
                    ];
                }
            }

            return [
                'user' => $user,
                'data' => $counts,
            ];
        });

        // Filtrar usuarios sin registros en todas las fechas
        $filteredUsers = $userData->filter(function ($userEntry) use ($dates) {
            foreach ($dates as $date) {
                if ($userEntry['data'][$date]['status'] !== 'missing') {
                    return true;
                }
            }
            return false;
        });

        return view('livewire.higiene-personal.reporte2', [
            'users' => $filteredUsers,
            'dates' => $dates,
        ]);
    }

    public function pdf()
    {

        return response()->streamDownload(
            function () {
                // Determinar las fechas a mostrar
                $dates = $this->selectedDate
                    ? [Carbon::parse($this->selectedDate)->toDateString()]
                    : collect(range(0, 6))->map(fn($i) => Carbon::today()->subDays($i)->toDateString());

                $users = User::whereNot('rol', 'Inhabilitado')->orderBy('lastname', 'asc')->get();

                $userData = $users->map(function ($user) use ($dates) {
                    $counts = [];
                    foreach ($dates as $date) {
                        $record = HigienePersonal::where('trabajador_id', $user->id)
                            ->whereDate('tiempo', $date)
                            ->first();

                        if ($record) {
                            $status = [
                                'uniforme' => $record->uniforme,
                                'higiene' => $record->higiene,
                                'salud' => $record->salud,
                                'objetos_extranos' => $record->objetos_extranos,
                                'observaciones' => $record->observaciones,
                                'correccion' => $record->correccion,
                            ];

                            $hasIssues = collect($status)->except(['observaciones', 'correccion'])->contains(0);

                            $counts[$date] = [
                                'status' => $hasIssues ? 'warning' : 'ok',
                                'details' => $hasIssues ? $status : null,
                            ];
                        } else {
                            $counts[$date] = [
                                'status' => 'missing',
                                'details' => null,
                            ];
                        }
                    }

                    return [
                        'user' => $user,
                        'data' => $counts,
                    ];
                });

                // Filtrar usuarios sin registros en todas las fechas
                $filteredUsers = $userData->filter(function ($userEntry) use ($dates) {
                    foreach ($dates as $date) {
                        if ($userEntry['data'][$date]['status'] !== 'missing') {
                            return true;
                        }
                    }
                    return false;
                });
                $users = $filteredUsers;
                $dates = $dates;

                $pdf = App::make('dompdf.wrapper');
                $pdf = Pdf::loadView('pdf.reportes.higienePersonal', compact(['users', 'dates']));
                $pdf->setPaper('letter', 'landscape');

                echo $pdf->stream();
            },
            "ReporteHigienePersonal.pdf"
        );
    }
}
