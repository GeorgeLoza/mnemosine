<?php

namespace App\Livewire\Orp;

use Carbon\Carbon;
use App\Models\Orp;
use App\Models\User;
use App\Models\Color;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Notifications\orpNotification;

class Kanban extends Component
{
    public $orps;

    public function mount()
    {

        $this->orps = Orp::where('created_at', '>=', Carbon::now()->subWeek())
            ->orderBy('estado')
            ->get();
    }


    public function siguiente($orpId, $estado)
    {
        $orp = Orp::find($orpId);

        if ($orp) {
            $orp->estado = $estado;
            if ($estado == 'En proceso') {
                $colorDisponible = Color::whereNull('orp_id')->first();
        if ($colorDisponible) {
            $colorDisponible->orp_id = $orpId;
            $colorDisponible->save();
        }
                $orp->tiempo_elaboracion = now();
            }

            // 

            if ($estado == 'Completado') {
                DB::table('colors')
                 ->where('orp_id', $orpId)
                ->update(['orp_id' => null]); 
            }   




            $orp->save();

            if ($estado == 'En proceso') {
                // Notificar a los usuarios admin
                $admins = User::where('rol', 'Admi')->orWhere('rol', 'Jef')->orWhere('rol', 'Sup')->get();

                foreach ($admins as $admin) {
                    $admin->notify(new orpNotification($orp));
                }
            }

            
            // Recargar las ORP después de actualizar el estado
            $this->orps = Orp::where('created_at', '>=', Carbon::now()->subWeek())->orderBy('estado')->get();
        }
    }
    public function render()
    {

        return view('livewire.orp.kanban', [
            'orpsPendientes' => $this->orps->where('estado', 'Pendiente'),
            'orpsProgramados' => $this->orps->where('estado', 'Programado'),
            'orpsEnProceso' => $this->orps->where('estado', 'En proceso'),
            'orpsCompletados' => $this->orps->where('estado', 'Completado'),
        ]);
    }
}
