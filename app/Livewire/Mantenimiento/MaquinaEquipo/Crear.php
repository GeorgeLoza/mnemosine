<?php

namespace App\Livewire\Mantenimiento\MaquinaEquipo;

use App\Models\MaquinaEquipo;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;
use Masmerise\Toaster\Toaster;

class Crear extends ModalComponent
{

    public $codigo_interno;
    public $codigo_contable;
    public $linea;
    public $tipo;
    public $marca;
    public $procedencia;
    public $voltaje;
    public $frecuencia;
    public $revision_rodamiento;
    public $verificacion_ruido;
    public $verificacion_vibracion;
    public $revision_retenes;
    public $correas_poleas_cadenas;
    public $revision_cinta;
    public $lubricacion;
    public $revision_motores;
    public $revision_sensores;
    public $limpieza_general;
    public $revision_botoneras;
    public $revision_parada_emergencia;
    public $revision_panel_electrico;
    public $calibracion;
    public $funcionamiento;
    public $evaluacion;
    public $frecuencia_mantenimiento;
    public $responsable;
    public $evidencia;

    public function submit()
    {


        try {
            MaquinaEquipo::create([
                'codigo_interno' => $this->codigo_interno,
                'codigo_contable' => $this->codigo_contable,
                'linea' => $this->linea,
                'tipo' => $this->tipo,
                'marca' => $this->marca,
                'procedencia' => $this->procedencia,
                'voltaje' => $this->voltaje,
                'frecuencia' => $this->frecuencia,
                'revision_rodamiento' => $this->revision_rodamiento,
                'verificacion_ruido' => $this->verificacion_ruido,
                'verificacion_vibracion' => $this->verificacion_vibracion,
                'revision_retenes' => $this->revision_retenes,
                'correas_poleas_cadenas' => $this->correas_poleas_cadenas,
                'revision_cinta' => $this->revision_cinta,
                'lubricacion' => $this->lubricacion,
                'revision_motores' => $this->revision_motores,
                'revision_sensores' => $this->revision_sensores,
                'limpieza_general' => $this->limpieza_general,
                'revision_botoneras' => $this->revision_botoneras,
                'revision_parada_emergencia' => $this->revision_parada_emergencia,
                'revision_panel_electrico' => $this->revision_panel_electrico,
                'calibracion' => $this->calibracion,
                'funcionamiento' => $this->funcionamiento,
                'evaluacion' => $this->evaluacion,
                'frecuencia_mantenimiento' => $this->frecuencia_mantenimiento,
                'responsable' => $this->responsable,
                'evidencia' => $this->evidencia,
            ]);
            $this->dispatch('lista_maquina');
            $this->closeModal();
            Toaster::success('Registro guardado exitosamente!');
        } catch (\Throwable $th) {

            Toaster::error('Fallo al momento de registrar: ' . $th->getMessage());
        }
    }
    public function render()
    {
        return view('livewire.mantenimiento.maquina-equipo.crear');
    }
}
