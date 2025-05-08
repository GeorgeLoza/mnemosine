<?php

namespace App\Livewire\Mantenimiento\InspeccionHerramienta;

use App\Models\Herramienta;
use App\Models\InspeccionHerramientas;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;
use LivewireUI\Modal\ModalComponent;

class Tabla extends Component
{
    use WithPagination;

    public $search = '';
    public $confirmingDelete = null;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function confirmDelete($id)
    {
        $this->confirmingDelete = $id;
    }

    public function delete($id)
    {
        InspeccionHerramientas::find($id)->delete();
        $this->confirmingDelete = null;
    }
    #[On('inpesccionHerramienta')]
    public function render()
    {
        $inspecciones = InspeccionHerramientas::with('herramienta')
            ->whereHas('herramienta', function($query) {
                $query->where('item', 'like', '%'.$this->search.'%');
            })
            ->paginate(10);

        return view('livewire.mantenimiento.inspeccion-herramienta.tabla', compact('inspecciones'));
    }
}
