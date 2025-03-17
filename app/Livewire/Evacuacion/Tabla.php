<?php

namespace App\Livewire\Evacuacion;

use App\Models\Evacuacion;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class Tabla extends Component
{
    use WithPagination;
    
    public $search = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }
    #[On('evacuacion-tabla')]
    public function render()
    {
        $evacuaciones = Evacuacion::where('tiempo', 'like', '%'.$this->search.'%')
            ->orderBy('tiempo', 'desc')
            ->paginate(10);

        return view('livewire.evacuacion.tabla', compact('evacuaciones'));
    }
    
    
}
