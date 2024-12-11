<?php

namespace App\Livewire\OrdLipDes;

use App\Models\OrdLimDes;
use App\Models\sector;
use Livewire\Component;
use Livewire\WithPagination;
use Masmerise\Toaster\Toaster;

class Tabla extends Component
{
    use WithPagination;

    public $nombre, $sector_id;
    public $lunes_lo = 1, $lunes_des = 1, $martes_lo = 1, $martes_des = 1;
    public $miercoles_lo = 1, $miercoles_des = 1, $jueves_lo = 1, $jueves_des = 1;
    public $viernes_des_pro = 1, $sabado_lo = 1, $sabado_des = 1, $domingo_lo = 1, $domingo_des = 1;
    public $ordLimDesId;
    public $isEditMode = false;
    public $sectores;

    protected $rules = [
        'nombre' => 'required|string|max:255',
        'sector_id' => 'nullable|integer',
    ];

    public function mount()
    {
        $this->sectores = Sector::all(); // Cargar los sectores al inicializar el componente.
    }

    public function resetInputFields()
    {
        $this->reset([
            'nombre', 'sector_id', 'lunes_lo', 'lunes_des', 'martes_lo', 'martes_des',
            'miercoles_lo', 'miercoles_des', 'jueves_lo', 'jueves_des', 'viernes_des_pro',
            'sabado_lo', 'sabado_des', 'domingo_lo', 'domingo_des', 'ordLimDesId', 'isEditMode'
        ]);
    }

    public function store()
    {
        $this->validate();
        OrdLimDes::create($this->allFields());
        $this->resetInputFields();
        Toaster::success('Registro guardado exitosamente!');
    }

    public function edit($id)
    {
        $record = OrdLimDes::findOrFail($id);
        $this->fill($record->toArray());
        $this->ordLimDesId = $id;
        $this->isEditMode = true;
    }

    public function update()
    {
        $this->validate();
        OrdLimDes::findOrFail($this->ordLimDesId)->update($this->allFields());
        $this->resetInputFields();
        Toaster::success('Registro guardado exitosamente!');
    }

    public function delete($id)
    {
        OrdLimDes::findOrFail($id)->delete();
        Toaster::success('Registro eliminado exitosamente!');
    }

    public function allFields()
    {
        // Convertir valores booleanos a 1 y 0 al guardar en la base de datos
        return [
            'nombre' => $this->nombre,
            'sector_id' => $this->sector_id,
            'lunes_lo' => $this->lunes_lo ? 1 : 0,
            'lunes_des' => $this->lunes_des ? 1 : 0,
            'martes_lo' => $this->martes_lo ? 1 : 0,
            'martes_des' => $this->martes_des ? 1 : 0,
            'miercoles_lo' => $this->miercoles_lo ? 1 : 0,
            'miercoles_des' => $this->miercoles_des ? 1 : 0,
            'jueves_lo' => $this->jueves_lo ? 1 : 0,
            'jueves_des' => $this->jueves_des ? 1 : 0,
            'viernes_des_pro' => $this->viernes_des_pro ? 1 : 0,
            'sabado_lo' => $this->sabado_lo ? 1 : 0,
            'sabado_des' => $this->sabado_des ? 1 : 0,
            'domingo_lo' => $this->domingo_lo ? 1 : 0,
            'domingo_des' => $this->domingo_des ? 1 : 0,
        ];
    }

    public function render()
    {
        return view('livewire.ord-lip-des.tabla', [
            'records' => OrdLimDes::paginate(10),
        ]);
    }
}
