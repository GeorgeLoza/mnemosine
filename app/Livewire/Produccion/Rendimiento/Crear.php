<?php

namespace App\Livewire\Produccion\Rendimiento;

use App\Models\Orp;
use App\Models\RendimientoCantidad;
use App\Models\User;
use Carbon\Carbon;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;
use Masmerise\Toaster\Toaster;

class Crear extends ModalComponent
{
    public $orp;
    public $rendimiento_teorico;
    public $rendimiento_real;
    public $cantidad_conforme;
    public $cantidad_no_conforme;
    public $cantidad_pedido;
    public $cantidad_contramuestra;
    public $muestra_micro;
    public $muestra_fisico;
    public $canastillo_limpio;
    public $cantidad_bolsa;
    public $calidad_sellado;
    public $cantidad_embalado;
    public $calidad_embalado;
    public $cantidad_canastillos;
    public $total_merma;
    public $observaciones;
    public $correccion;


    public $trabajador_id1;
    public $codigo1;
    public $nombre1;
    public $trabajador_id2;
    public $codigo2;
    public $nombre2;

    public $user1;
    public $user2;



    public function mount()
    {
        $lote = Orp::where('id', $this->orp)->value('lote'); // Obtiene directamente el valor del campo 'lote'

    }

    public function updatedCodigo1()
    {
        // Buscar el usuario por el código
        $this->user1 = User::where('codigo', $this->codigo1)->first();

        // Si se encuentra el usuario, establecer el nombre; si no, dejar el campo vacío
        $this->nombre1 = $this->user1 ? $this->user1->name . " " . $this->user1->lastname : null;
        $this->trabajador_id1 = $this->user1 ? $this->user1->id : null;
    }
    public function updatedCodigo2()
    {
        // Buscar el usuario por el código
        $this->user2 = User::where('codigo', $this->codigo2)->first();

        // Si se encuentra el usuario, establecer el nombre; si no, dejar el campo vacío
        $this->nombre2 = $this->user2 ? $this->user2->name . " " . $this->user2->lastname : null;
        $this->trabajador_id2 = $this->user2 ? $this->user2->id : null;
    }


    public function render()
    {
        return view('livewire.produccion.rendimiento.crear');
    }

    public function submit()
    {

        try {
            RendimientoCantidad::create([
                'tiempo' => Carbon::now(),
                'orp_id' => $this->orp,
                'rendimiento_teorico' => $this->rendimiento_teorico,
                'rendimiento_real' => $this->rendimiento_real,
                'cantidad_conforme' => $this->cantidad_conforme,
                'cantidad_no_conforme' => $this->cantidad_no_conforme,
                'cantidad_pedido' => $this->cantidad_pedido,
                'cantidad_contramuestra' => $this->cantidad_contramuestra,
                'muestra_micro' => $this->muestra_micro,
                'muestra_fisico' => $this->muestra_fisico,
                'canastillo_limpio' => $this->canastillo_limpio,
                'cantidad_bolsa' => $this->cantidad_bolsa,
                'calidad_sellado' => $this->calidad_sellado,
                'cantidad_embalado' => $this->cantidad_embalado,
                'calidad_embalado' => $this->calidad_embalado,
                'cantidad_canastillos' => $this->cantidad_canastillos,
                'total_merma' => $this->total_merma,
                'user_recepcionado' => $this->user1->id,
                'user_entregado' => $this->user2->id,
                'user_id' => auth()->user()->id,
                'observaciones' => $this->observaciones,
                'correccion' => $this->correccion,
            ]);
            $this->dispatch('reporte');
            $this->closeModal();
            Toaster::success('Registro guardado exitosamente!');

            // Reset fields after submission
            $this->reset([
                
                'observaciones',
                'correccion',
            ]);
        } catch (\Throwable $th) {
            Toaster::error('Fallo al momento de registrar: ' . $th->getMessage());
        }
    }
}
