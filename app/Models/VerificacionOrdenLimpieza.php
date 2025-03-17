<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VerificacionOrdenLimpieza extends Model
{
    use HasFactory;

    protected $fillable = [
        'tiempo',
        'user_id',
        'orden_limpieza_id',
        'estado',
        'observaciones',
        'correccion'
    ];

    /**
     * Relación muchos a uno con OrdenLimpieza
     */
    public function ordenLimpieza()
    {
        return $this->belongsTo(OrdenLimpieza::class);
    }

    /**
     * Relación muchos a uno con User
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
