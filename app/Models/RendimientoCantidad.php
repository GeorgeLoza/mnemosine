<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RendimientoCantidad extends Model
{
    use HasFactory;

    protected $fillable = [
        'tiempo',
        'orp_id',
        'rendimiento_teorico',
        'rendimiento_real',
        'cantidad_conforme',
        'cantidad_no_conforme',
        'cantidad_pedido',
        'cantidad_contramuestra',
        'muestra_micro',
        'muestra_fisico',
        'canastillo_limpio',
        'cantidad_bolsa',
        'calidad_sellado',
        'cantidad_embalado',
        'calidad_embalado',
        'cantidad_canastillos',
        'total_nerma',
        'user_id',
        'user_recepcionado',
        'user_entregado',
        'observaciones',
        'correccion',
    ];

    /**
     * Relación con la tabla ORP.
     */
    public function orp()
    {
        return $this->belongsTo(Orp::class);
    }

    /**
     * Relación con el usuario que creó el registro.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Relación con el usuario que recepcionó.
     */
    public function userRecepcionado()
    {
        return $this->belongsTo(User::class, 'user_recepcionado');
    }

    /**
     * Relación con el usuario que entregó.
     */
    public function userEntregado()
    {
        return $this->belongsTo(User::class, 'user_entregado');
    }
}
