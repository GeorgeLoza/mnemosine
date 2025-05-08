<?php

namespace App\Livewire\Curaciones;

use App\Models\Curacion;
use App\Models\User;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;
use Masmerise\Toaster\Toaster;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Support\Facades\App;

class Tabla extends Component
{
    use WithPagination;

    public $tiempo, $trabajador, $detalle, $esparatrapo, $guante, $responsable_inicio, $responsable_fin, $observaciones;
    public $trabajoId;
    public $modalFormVisible = false;

    protected $rules = [
        'tiempo' => 'required|date',
        'trabajador' => 'required|exists:users,id',
        'detalle' => 'required|string',
        'esparatrapo' => 'boolean',
        'guante' => 'boolean',
        'responsable_inicio' => 'required|exists:users,id',
        'responsable_fin' => 'required|exists:users,id',
        'observaciones' => 'nullable|string',
    ];

    public function showCreateForm()
    {
        $this->reset();
        $this->modalFormVisible = true;
    }

    public function showEditForm($id)
    {
        $this->trabajoId = $id;
        $trabajo = Curacion::findOrFail($id);
        $this->fill($trabajo->toArray());
        $this->modalFormVisible = true;
    }

    public function update()
    {
        $this->validate();
        Curacion::findOrFail($this->trabajoId)->update($this->only(['tiempo', 'trabajador', 'detalle', 'esparatrapo', 'guante', 'responsable_inicio', 'responsable_fin', 'observaciones']));
        $this->modalFormVisible = false;
        session()->flash('message', 'Trabajo actualizado correctamente.');
    }

    public function fin($id)
    {
        $curacion = Curacion::findOrFail($id);
        $curacion->update([
            'responsable_fin' => auth()->user()->id,

        ]);

        $this->dispatch('curacionActualizada');
        Toaster::success('Registro actualizado exitosamente!');
    }
    public function delete($id)
    {
        Curacion::findOrFail($id)->delete();
        Toaster::success('Registro Elimanado exitosamente!');
        $this->dispatch('curacion');
    }
    #[On('curacion')]
    public function render()
    {
        return view('livewire.curaciones.tabla', [
            'curaciones' => Curacion::orderBy('tiempo', 'desc')->paginate(10),
            'usuarios' => User::all()
        ]);
    }

    public function pdf()
    {

        return response()->streamDownload(
            function () {
                $datos = Curacion::paginate(10);

                $pdf = App::make('dompdf.wrapper');
                $pdf = Pdf::loadView('pdf.reportes.curacion', compact(['datos']));
                $pdf->setPaper('letter', 'landscape');

                echo $pdf->stream();
            },
            "ReporteCuracionDotacion.pdf"
        );
    }
}
