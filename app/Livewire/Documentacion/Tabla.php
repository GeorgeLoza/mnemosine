<?php

namespace App\Livewire\Documentacion;

use App\Models\Documentacion;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Storage;

class Tabla extends Component
{
    use WithPagination;

    public $search = '';
    public $sortField = 'codigo';
    public $sortDirection = 'asc';
    public $selectedArea = null;
    public $selectedProcedure = null;
    public $selectedTipo = null;
    
    protected $queryString = [
        'search', 
        'sortField', 
        'sortDirection',
        'selectedArea',
        'selectedProcedure',
        'selectedTipo'
    ];

    public function sortBy($field)
    {
        $this->sortDirection = $this->sortField === $field 
            ? $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc'
            : 'asc';

        $this->sortField = $field;
    }

    public function delete($id)
{
    $documento = Documentacion::find($id);
    
    // Eliminar archivos asociados
    if($documento->pdf_path) {
        Storage::disk('public')->delete($documento->pdf_path);
    }
    if($documento->word_path) {
        Storage::disk('public')->delete($documento->word_path);
    }
    
    // Eliminar el registro
    $documento->delete();
    
    session()->flash('message', 'Documento eliminado exitosamente');
}

public function render()
{
    $areas = Documentacion::distinct('area')->pluck('area');
    $tipos = Documentacion::distinct('tipo')->pluck('tipo');
    
    $procedures = Documentacion::where('tipo', 'Procedimiento')
        ->when($this->selectedArea, function ($query) {
            $query->where('area', $this->selectedArea);
        })
        ->get();

    return view('livewire.documentacion.tabla', [
        'documentos' => Documentacion::with(['creador', 'documentoReferenciado'])
            ->when($this->selectedArea, function ($query) {
                $query->where('area', $this->selectedArea);
            })
            ->when($this->selectedProcedure, function ($query) {
                $query->where('documento_referenciado_id', $this->selectedProcedure);
            })
            ->when($this->selectedTipo, function ($query) {
                $query->where('tipo', $this->selectedTipo);
            })
            ->where(function($query) {
                $query->where('codigo', 'like', '%'.$this->search.'%')
                      ->orWhere('titulo', 'like', '%'.$this->search.'%')
                      ->orWhere('tipo', 'like', '%'.$this->search.'%');
            })
            ->orderBy($this->sortField, $this->sortDirection)
            ->paginate(40),
        'areas' => $areas,
        'procedures' => $procedures,
        'tipos' => $tipos
    ]);
}

public function resetFilters()
{
    $this->reset(['selectedArea', 'selectedProcedure', 'selectedTipo']);
}
}
