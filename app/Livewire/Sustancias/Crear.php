<?php

namespace App\Livewire\Sustancias;

use App\Models\Sustancia;
use App\Models\SustanciasMov;
use Carbon\Carbon;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;
use Masmerise\Toaster\Toaster;

class Crear extends ModalComponent
{
    public $sustancias;
    
    /* Inputs */
    public $sustancia_id;
    public $tipo;
    public $cantidad;
    public $saldo;
    public $area;
    public $observaciones;
    public $user_id;

    protected $rules = [
        'sustancia_id' => 'required',
        'tipo' => 'required|in:Ingreso,Salida',
        'cantidad' => 'required|numeric',
    ];

    public function mount()
    {
        $this->sustancias = Sustancia::all();
    }

    public function updatedSustanciaId()
    {
        $this->calcularSaldo();
    }

    public function updatedTipo()
    {
        $this->calcularSaldo();
    }

    public function updatedCantidad()
    {
        $this->calcularSaldo();
    }

    private function calcularSaldo()
    {
        if (!$this->sustancia_id || !$this->tipo || !$this->cantidad) {
            return;
        }

        $ultimoRegistro = SustanciasMov::where('sustancia_id', $this->sustancia_id)
            ->latest('id')
            ->first();

        $saldoAnterior = $ultimoRegistro ? $ultimoRegistro->saldo : 0;

        $cantidadAjustada = $this->tipo === 'Ingreso' ? $this->cantidad : -$this->cantidad;

        $this->saldo = $saldoAnterior + $cantidadAjustada;
    }

    public function submit()
    {
        $this->validate();
        
        try {
            $cantidadAjustada = $this->tipo === 'Ingreso' ? $this->cantidad : -$this->cantidad;

            SustanciasMov::create([
                'user_id' => auth()->user()->id,
                'tiempo' => Carbon::now(),
                'sustancia_id' => $this->sustancia_id,
                'tipo' => $this->tipo,
                'cantidad' => $cantidadAjustada,
                'saldo' => $this->saldo,
                'area' => $this->area,
                'observaciones' => $this->observaciones,
            ]);

            $this->dispatch('sustancias');
            $this->closeModal();
            Toaster::success('Registro guardado exitosamente!');
        } catch (\Throwable $th) {
            Toaster::error('Fallo al registrar: ' . $th->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.sustancias.crear');
    }
    public function cerrar()
    {
        $this->closeModal();
    }
}
