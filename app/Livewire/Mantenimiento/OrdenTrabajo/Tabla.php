<?php

namespace App\Livewire\Mantenimiento\OrdenTrabajo;

use App\Models\OrdenTrabajo;
use App\Models\RevisionDiariaMaquina;
use App\Models\User;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;
use Masmerise\Toaster\Toaster;

class Tabla extends Component
{
    use WithPagination;

    public $tipos;

    public $estado = '';
    public $ot = '';
    public $tipo = '';
    public $fecha_inicio = '';
    public $fecha_fin = '';

    #[On('orden_trabajo')]
    public function render()
    {
        
        $query = OrdenTrabajo::query();
        if ($this->tipos == "infrestructura") {
            $query->whereNot('mantenimiento_infrestructura_id', NULL);
        }
        if ($this->tipos == "maquinaria") {
            $query->whereNot('maquina_equipo_id', NULL);
        }
        if ($this->estado) {
            $query->where('estado', $this->estado);
        }
        if ($this->ot) {
            $query->where('numero_ot', $this->ot);
        }

        if ($this->tipo) {
            $query->whereHas('maquinaEquipo', function ($q) {
                $q->where('tipo', $this->tipo);
            })->orWhereNull('maquina_equipo_id')->when($this->tipo == 'Infraestructura', fn($q) => $q); 
        }

        

        if ($this->fecha_inicio && $this->fecha_fin) {
            $query->whereBetween('tiempo_solicitud', [$this->fecha_inicio, $this->fecha_fin]);
        }

        $ordenes = $query->orderBy('id', 'DESC')->paginate(10);

        return view('livewire.mantenimiento.orden-trabajo.tabla', compact('ordenes'));
    }

    public function clearFilters()
    {
        $this->reset(['estado', 'tipo', 'fecha_inicio', 'fecha_fin']);
    }

    public function approve(OrdenTrabajo $ordenTrabajo)
    {
        $ordenTrabajo->estado = 'Completado';
        $ordenTrabajo->user_aprobado = auth()->id();
        $ordenTrabajo->save();

        Toaster::success('Registro guardado exitosamente!');
    }

    public function delete($id)
    {
        $orden = OrdenTrabajo::findOrFail($id);
        try {
            $revision = RevisionDiariaMaquina::where('observaciones', $orden->numero_ot)->first();
            $revision->delete();
            $orden->delete();
        
        } catch (\Throwable $th) {
            //throw $th;
        }

        Toaster::success('Registro Borrado exitosamente!');
    }
}
