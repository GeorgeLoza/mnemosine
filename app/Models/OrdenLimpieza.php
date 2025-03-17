<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrdenLimpieza extends Model
{
    use HasFactory;

    protected $fillable = [
        'responsable',
        'area',
        'grupo',
        'periodo',
        'detalle'
    ];

    /**
     * Relación uno a muchos con VerificacionOrdenLimpieza
     */
    public function verificaciones()
    {
        return $this->hasMany(VerificacionOrdenLimpieza::class);
    }
}
