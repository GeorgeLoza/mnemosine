<?php


namespace App\Livewire\Mantenimiento\Infrestructura;

use Livewire\Component;
use App\Models\MantenimientoInfrestructuras;
use LivewireUI\Modal\ModalComponent;
use Masmerise\Toaster\Toaster;

class Crear extends ModalComponent
{
    public $codigo_interno;
    public $area;
    public $subarea;
    public $infrestructura;

    protected $rules = [
        'codigo_interno' => 'nullable|string|max:255',
        'area' => 'required|string|max:255',
        'subarea' => 'required|string|max:255',
        'infrestructura' => 'required|string|max:255'
    ];

    public function submit()
    {

        $this->validate();
        try {
            MantenimientoInfrestructuras::create([
                'codigo_interno' => $this->codigo_interno,
                'area' => $this->area,
                'subarea' => $this->subarea,
                'infrestructura' => $this->infrestructura
            ]);
            $this->dispatch('infrestructura');
            $this->closeModal();
            Toaster::success('Registro guardado exitosamente!');
        } catch (\Throwable $th) {
        }
    }

    public function render()
    {
        return view('livewire.mantenimiento.infrestructura.crear');
    }
}
