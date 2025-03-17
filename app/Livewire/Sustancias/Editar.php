<?php

namespace App\Livewire\Sustancias;

use App\Models\Sustancia;
use App\Models\SustanciasMov;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;
use Masmerise\Toaster\Toaster;

class Editar extends ModalComponent
{
    public $sustancias;
    public $sustanciaMov;

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
        'cantidad' => 'required|numeric ',
    ];

    public function mount($id)
    {
        $this->sustancias = Sustancia::all();
        $this->sustanciaMov = SustanciasMov::findOrFail($id);
        
        // Cargar datos existentes
        $this->sustancia_id = $this->sustanciaMov->sustancia_id;
        $this->tipo = $this->sustanciaMov->tipo;
        $this->cantidad = abs($this->sustanciaMov->cantidad);
        $this->saldo = $this->sustanciaMov->saldo;
        $this->area = $this->sustanciaMov->area;
        $this->observaciones = $this->sustanciaMov->observaciones;
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
            ->where('id', '<>', $this->sustanciaMov->id) // Excluir el actual
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
            
            $this->sustanciaMov->update([
                'sustancia_id' => $this->sustancia_id,
                'tipo' => $this->tipo,
                'cantidad' => $cantidadAjustada,
                'saldo' => $this->saldo,
                'area' => $this->area,
                'observaciones' => $this->observaciones,
            ]);

            $this->dispatch('sustancias');
            $this->closeModal();
            Toaster::success('Registro actualizado exitosamente!');
        } catch (\Throwable $th) {
            Toaster::error('Fallo al actualizar: ' . $th->getMessage());
        }
    }
    public function render()
    {
        return view('livewire.sustancias.editar');
    }
}
