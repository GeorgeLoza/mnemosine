<?php

namespace App\Livewire\Mantenimiento\OrdenTrabajo;

use App\Models\OrdenTrabajo;
use App\Models\VerificacionHerramienta;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\App;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class Reporte extends ModalComponent
{
    public $id;
    public $orden;
    public $herramientas;
    
    public function mount($id)
    {
        $this->orden = OrdenTrabajo::find($id);
        $this->herramientas = VerificacionHerramienta::with(['userIngreso', 'userSalida'])->where('orden_trabajo_id', $id)->get();
        

        
    }
    public function render()
    {
        return view('livewire.mantenimiento.orden-trabajo.reporte');
    }

    public function pdf()
    {

        return response()->streamDownload(
            function () {

        $orden = $this->orden;
        $herramientas = $this->herramientas;
                $pdf = App::make('dompdf.wrapper');
                $pdf = Pdf::loadView('pdf.reportes.ordenTrabajo', compact(['orden', 'herramientas']));
                $pdf->setPaper('letter', 'portraid');

                echo $pdf->stream();
            },
            "Ordentrabajo.pdf"
        );
    }
}
