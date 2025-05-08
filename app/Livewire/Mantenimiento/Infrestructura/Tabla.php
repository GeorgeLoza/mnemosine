<?php


namespace App\Livewire\Mantenimiento\Infrestructura;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\MantenimientoInfrestructura;
use App\Models\MantenimientoInfrestructuras;
use Livewire\Attributes\On;

class Tabla extends Component
{
    use WithPagination;

    public $search = '';
    protected $listeners = ['refreshTable' => '$refresh'];

    public function delete($id)
    {
        MantenimientoInfrestructuras::find($id)->delete();
        $this->dispatchBrowserEvent('notify', [
            'type' => 'success',
            'message' => 'Registro eliminado!'
        ]);
    }
    #[On('infrestructura')]
    public function render()
    {
        $registros = MantenimientoInfrestructuras::when($this->search, function($query){
            $query->where('codigo_interno', 'like', '%'.$this->search.'%')
                  ->orWhere('area', 'like', '%'.$this->search.'%')
                  ->orWhere('subarea', 'like', '%'.$this->search.'%')
                  ->orWhere('infrestructura', 'like', '%'.$this->search.'%');
        })->paginate(10);

        return view('livewire.mantenimiento.infrestructura.tabla', [
            'registros' => $registros
        ]);
    }
}