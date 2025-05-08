<?php

namespace App\Livewire\Evacuacion;

use App\Models\Evacuacion;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use LivewireUI\Modal\Modal;
use LivewireUI\Modal\ModalComponent;
use Masmerise\Toaster\Toaster;

class Crear extends ModalComponent
{
    public $tiempo;
    public $turno;
    public $zunino, $molde, $hiline, $reposteria, $hi_line_bk, $grissin, $hornos, $codificado;
    public $embolsado_t1, $embolsado_t2, $embolsado_pan_molde, $embolsado_bk, $embolsado_reposteria, $embolsado_grissin;
    public $observacion, $correcion;

    protected $rules = [
        'turno' => 'required',
    ];


    public function save()
    {
        $this->validate();
        try {
            
            Evacuacion::create([
                'tiempo' => now(),
                'turno' => $this->turno,
                'user_id' => Auth::id(),
                'zunino' => $this->zunino,
                'molde' => $this->molde,
                'hiline' => $this->hiline,
                'reposteria' => $this->reposteria,
                'bk' => $this->hi_line_bk,
                'grissin' => $this->grissin,
                'hornos' => $this->hornos,
                'codificado' => $this->codificado,
                'embolsado_t1' => $this->embolsado_t1,
                'embolsado_t2' => $this->embolsado_t2,
                'embolsado_pan_molde' => $this->embolsado_pan_molde,
                'embolsado_bk' => $this->embolsado_bk,
                'embolsado_reposteria' => $this->embolsado_reposteria,
                'embolsado_grissin' => $this->embolsado_grissin,
                'observacion' => $this->observacion,
                'correcion' => $this->correcion,
            ]);
            
            Toaster::success('Registro guardado exitosamente!');
            $this->dispatch('evacuacion-tabla');
            $this->closeModal();
            $this->reset();
        } catch (\Throwable $th) {
            dd($th);
            Toaster::error('Fallo al momento de registrar: ' . $th->getMessage());
        }
    }


    public function render()
    {
        return view('livewire.evacuacion.crear');
    }
    public function cerrar()
    {
        $this->closeModal();
    }
}
