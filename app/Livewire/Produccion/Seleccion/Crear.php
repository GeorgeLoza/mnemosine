<?php

namespace App\Livewire\Produccion\Seleccion;

use App\Models\Orp;
use App\Models\SeleccionVisual;
use App\Models\User;
use Carbon\Carbon;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;
use Masmerise\Toaster\Toaster;

class Crear extends ModalComponent
{
    public $orp;
    public $color_corteza;
    public $color_base;
    public $aspecto_miga;
    public $deformidad_corte;
    public $agujero_aire;
    public $huecos_desgrane;
    public $insuficiencia_ajonjoli;
    public $exceso_ajonjoli;
    public $arrugas_superficie;
    public $globos_superficie;
    public $harina_base;
    public $simetria;
    public $hundimiento_base;
    public $presencio_beso;
    public $total_merma;
    public $observaciones;
    public $correccion;


    public $trabajador_id;
    public $preparacion;
    public $codigo;
    public $nombre;
    public $user;

    protected $rules = [
        'codigo' => 'required',
    ];


    public function mount()
    {
        $lote = Orp::where('id', $this->orp)->value('lote'); // Obtiene directamente el valor del campo 'lote'
    }

    public function updatedCodigo()
    {
        // Buscar el usuario por el código
        $this->user = User::where('codigo', $this->codigo)->first();

        // Si se encuentra el usuario, establecer el nombre; si no, dejar el campo vacío
        $this->nombre = $this->user ? $this->user->name . " " . $this->user->lastname : null;
        $this->trabajador_id = $this->user ? $this->user->id : null;
    }





    public function render()
    {
        return view('livewire.produccion.seleccion.crear');
    }

    public function submit()
    {

        $this->validate();
        try {
            SeleccionVisual::create([
                'tiempo' => Carbon::now(),
                'preparacion' => $this->preparacion,
                'orp_id' => $this->orp,
                'color_corteza' => $this->color_corteza,
                'color_base' => $this->color_base,
                'aspecto_miga' => $this->aspecto_miga,
                'deformidad_corte' => $this->deformidad_corte,
                'agujero_aire' => $this->agujero_aire,
                'huecos_desgrane' => $this->huecos_desgrane,
                'insuficiencia_ajonjoli' => $this->insuficiencia_ajonjoli,
                'exceso_ajonjoli' => $this->exceso_ajonjoli,
                'arrugas_superficie' => $this->arrugas_superficie,
                'globos_superficie' => $this->globos_superficie,
                'harina_base' => $this->harina_base,
                'simetria' => $this->simetria,
                'hundimiento_base' => $this->hundimiento_base,
                'presencio_beso' => $this->presencio_beso,
                'total_merma' => $this->total_merma,
                'responsable' => $this->user->id,
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
