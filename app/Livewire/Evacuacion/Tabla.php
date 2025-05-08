<?php

namespace App\Livewire\Evacuacion;

use App\Models\Evacuacion;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;
use Masmerise\Toaster\Toaster;
use Carbon\Carbon;

class Tabla extends Component
{
    use WithPagination;
    
    public $search = '';
    public $fechaInicio;
    public $fechaFin;

    public function mount()
    {
        $this->fechaInicio = Carbon::now()->startOfMonth()->toDateString();
        $this->fechaFin = Carbon::now()->endOfMonth()->toDateString();
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updated()
    {
        $this->resetPage();
    }

    #[On('evacuacion-tabla')]
    public function render()
    {
        $evacuaciones = Evacuacion::query()
            ->whereBetween('tiempo', [
                Carbon::parse($this->fechaInicio)->startOfDay(),
                Carbon::parse($this->fechaFin)->endOfDay()
            ])
            ->orderBy('tiempo', 'desc')
            ->paginate(10);

        return view('livewire.evacuacion.tabla', compact('evacuaciones'));
    }

    public function delete($id)
    {
        Evacuacion::findOrFail($id)->delete();
        Toaster::success('Registro Eliminado exitosamente!');
        $this->dispatch('evacuacion-tabla');
    }
}