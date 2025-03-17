<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrdenTrabajo extends Model
{
    use HasFactory;

    protected $fillable = [
        'tiempo_solicitud',
        'user_solicitante',
        'numero_ot',
        'tipo_ot',
        'desperfecto',
        'maquina_equipo_id',
        'estado',
        'tiempo_respuesta',
        'user_tecnico',
        'accion',
        'user_aprobado',
    ];

    public function solicitante()
    {
        return $this->belongsTo(User::class, 'user_solicitante');
    }

    public function tecnico()
    {
        return $this->belongsTo(User::class, 'user_tecnico');
    }

    public function aprobadoPor()
    {
        return $this->belongsTo(User::class, 'user_aprobado');
    }
    public function maquinaEquipo()
    {
        return $this->belongsTo(MaquinaEquipo::class, 'maquina_equipo_id');
    }
}
