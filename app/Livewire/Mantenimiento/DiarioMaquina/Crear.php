<?php

namespace App\Livewire\Mantenimiento\DiarioMaquina;

use App\Models\MaquinaEquipo;
use App\Models\RevisionDiariaMaquina;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Masmerise\Toaster\Toaster;

class Crear extends Component
{
public $maquinasPorLinea;
    public function mount(){
        $this->maquinasPorLinea = MaquinaEquipo::orderBy('linea')
        ->get()
        ->groupBy('linea')
        ->map(function ($maquinas, $linea) {
            return [
                'linea' => $linea,
                'maquinas' => $maquinas->map(function ($maquina) {
                    return [
                        'id' => $maquina->id,
                        'codigo_interno' => $maquina->codigo_interno,
                        'tipo' => $maquina->tipo,
                        'marca' => $maquina->marca,
                        // Agrega otros campos si son necesarios
                    ];
                }),
            ];
        });
    }
    public function render()
    {
        return view('livewire.mantenimiento.diario-maquina.crear');
    }
    public function bien($id)
    {
        try {
            RevisionDiariaMaquina::create([
                'maquina_equipo_id' => $id,
                'tiempo' => now(),
                'estado' => 'bien', // Estado "bien"
                'observaciones' => 'Revisión diaria completada exitosamente.',
                'correccion' => null, // Si no hay corrección, lo dejamos en null
            ]);

            $this->dispatch('revision_diaria');
            
            Toaster::success('Registro guardado exitosamente!');
        } catch (\Throwable $th) {
            Toaster::error('Fallo al momento de registrar: ' . $th->getMessage());
        }
    }

    public function malo($id)
    {
        try {
            RevisionDiariaMaquina::create([
                'maquina_equipo_id' => $id,
                'tiempo' => now(),
                'estado' => 'mal', // Estado "mal"
                'observaciones' => 'Se detectaron problemas en la revisión diaria.',
                'correccion' => null, // Puede ser modificado si hay una corrección
            ]);

            $this->dispatch('revision_diaria');
            
            Toaster::success('Registro guardado exitosamente!');
        } catch (\Throwable $th) {
            Toaster::error('Fallo al momento de registrar: ' . $th->getMessage());
        }
        
    }
}
