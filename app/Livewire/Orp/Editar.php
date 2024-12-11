<?php

namespace App\Livewire\Orp;

use App\Models\Orp;
use League\Csv\Reader;
use Livewire\Component;
use App\Models\Producto;

use Livewire\WithFileUploads;
use LivewireUI\Modal\ModalComponent;

class Editar extends ModalComponent
{
    public $id;
    //input
    public $codigo;
    public $producto_id;
    public $lote;
    public $estado;
    public $tiempo_elaboracion;
    public $fecha_vencimiento1;
    public $fecha_vencimiento2;
    
    //valores para cargar selects
    public $productos;

    public function mount()
    {

        
        $this->productos = Producto::all();

        $orp = Orp::where('id', $this->id)->first();
        $this->codigo = $orp->codigo;
        $this->producto_id = $orp->producto_id;
        $this->lote = $orp->lote;
        $this->estado = $orp->estado;
        $this->tiempo_elaboracion = $orp->tiempo_elaboracion;
        $this->fecha_vencimiento1 = $orp->fecha_vencimiento1;
        $this->fecha_vencimiento2 = $orp->fecha_vencimiento2;
    }
   
    public function render()
    {
        return view('livewire.orp.editar');
    }
    public function update()
    {

        $this->validate([
            'codigo' => 'required',
            'producto_id' => 'required',
            'lote' => 'required',
        ]);
        try {

            $orp = Orp::find($this->id);
            $orp->codigo =$this->codigo;
            $orp->producto_id =$this->producto_id;
            $orp->lote =$this->lote;
            $orp->tiempo_elaboracion =$this->tiempo_elaboracion;
            $orp->fecha_vencimiento1 =$this->fecha_vencimiento1;
            $orp->fecha_vencimiento2 =$this->fecha_vencimiento2;
            $orp->save();

            $this->dispatch('actualizar_tabla_orps');
            $this->closeModal();
            $this->dispatch('success', mensaje: 'Se actualizo informacion de la ORP exitosamente');
        } catch (\Throwable $th) {
            $this->closeModal();

            $this->dispatch('error_mensaje', mensaje: 'problema'.$th->getMessage());
        }
    }

   
}
