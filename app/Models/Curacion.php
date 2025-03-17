<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curacion extends Model
{
    use HasFactory;

    protected $fillable = [
        'tiempo',
        'trabajador_id',
        'detalle',
        'esparatrapo',
        'guante',
        'responsable_inicio',
        'responsable_fin',
        'observaciones'
    ];

    public function trabajador()
    {
        return $this->belongsTo(User::class, 'trabajador_id');
    }

    public function responsableInicio()
    {
        return $this->belongsTo(User::class, 'responsable_inicio');
    }

    public function responsableFin()
    {
        return $this->belongsTo(User::class, 'responsable_fin');
    }
}
