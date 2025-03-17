<?php

namespace App\Livewire\Sustancias;

use App\Models\Sustancia;
use App\Models\SustanciasMov;
use Carbon\Carbon;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class Tabla extends Component
{
    use WithPagination;
    public $sustancia_id, $fecha_inicio, $fecha_fin;

    public $sustancias;

    public function mount() {
        $this->sustancias = Sustancia::all();
    }
    #[On('sustancias')]
    public function render()
    {
        $query = SustanciasMov::orderBy('id', 'desc');

        // Filtros
        if ($this->sustancia_id) {
            $query->where('sustancia_id', $this->sustancia_id);
        }

        if ($this->fecha_inicio) {
            $query->whereDate('tiempo', '>=', Carbon::parse($this->fecha_inicio));
        }

        if ($this->fecha_fin) {
            $query->whereDate('tiempo', '<=', Carbon::parse($this->fecha_fin));
        }

        $movimientos = $query->paginate(50);

        return view('livewire.sustancias.tabla', [
            'movimientos' => $movimientos
        ]);
    }

    public function delete($id)
    {
        SustanciasMov::findOrFail($id)->delete();
        session()->flash('message', 'Trabajo eliminado correctamente.');
    }

    public function resetFilters()
    {
        $this->reset(['sustancia_id', 'fecha_inicio', 'fecha_fin']);
        $this->resetPage();
    }
}
