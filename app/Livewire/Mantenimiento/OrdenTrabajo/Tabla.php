<?php

namespace App\Livewire\Mantenimiento\OrdenTrabajo;

use App\Models\OrdenTrabajo;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;
use Masmerise\Toaster\Toaster;

class Tabla extends Component
{
    use WithPagination;
    #[On('orden_trabajo')]
    public function render()
    {
        // Puedes aplicar filtros o paginación según sea necesario
        $ordenes = OrdenTrabajo::paginate(10);

        return view('livewire.mantenimiento.orden-trabajo.tabla', compact('ordenes'));
    }

    public function approve(OrdenTrabajo $ordenTrabajo)
    {
        // Cambiar el estado de la orden a "Completado"
        $ordenTrabajo->estado = 'Completado';
        $ordenTrabajo->user_aprobado = auth()->id();
        $ordenTrabajo->save();

        // Notificar que el estado ha sido actualizado
        Toaster::success('Registro guardado exitosamente!');
    }
    
}
