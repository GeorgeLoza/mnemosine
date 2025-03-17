<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaquinaEquipo extends Model
{
    use HasFactory;

    protected $fillable = [
        'codigo_interno',
        'codigo_contable',
        'linea',
        'tipo',
        'marca',
        'procedencia',
        'voltaje',
        'frecuencia',
        'revision_rodamiento',
        'verificacion_ruido',
        'verificacion_vibracion',
        'revision_retenes',
        'correas_poleas_cadenas',
        'revision_cinta',
        'lubricacion',
        'revision_motores',
        'revision_sensores',
        'limpieza_general',
        'revision_botoneras',
        'revision_parada_emergencia',
        'revision_panel_electrico',
        'calibracion',
        'funcionamiento',
        'evaluacion',
        'frecuencia_mantenimiento',
        'responsable',
        'evidencia',
    ];
    public function revisionDiaria()
    {
        return $this->belongsTo(RevisionDiariaMaquina::class);
    }
    public function ot()
    {
        return $this->belongsTo(OrdenTrabajo::class);
    }
}
