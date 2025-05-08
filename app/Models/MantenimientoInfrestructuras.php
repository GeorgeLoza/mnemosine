<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MantenimientoInfrestructuras extends Model
{
    use HasFactory;

    protected $fillable = [
        'codigo_interno',
        'area',
        'subarea',
        'infrestructura',
    ];
    // A esto:
    public function revisionesMensuales()
    {
        return $this->hasMany(RevisionMensual::class, 'mantenimiento_infrestructura_id');
    }
    public function ot()
    {
        return $this->belongsTo(OrdenTrabajo::class);
    }
}
