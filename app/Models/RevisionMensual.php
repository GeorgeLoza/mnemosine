<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RevisionMensual extends Model
{
    
    use HasFactory;

    protected $fillable = [
        'mantenimiento_infrestructura_id',
        'fecha',
        'estado',
        'observaciones',
        'correccion'
    ];

    protected $casts = [
        'fecha' => 'date'
    ];

    public function mantenimientoInfrestructura()
    {
        return $this->belongsTo(MantenimientoInfrestructuras::class);
    }
}
