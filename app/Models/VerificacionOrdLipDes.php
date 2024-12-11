<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VerificacionOrdLipDes extends Model
{
    protected $fillable = [
        'tiempo',
        'ord_lim_des_id',
        'limpieza',
        'desinfeccion',
        'profunda',
        'observaciones',
        'correccion',
        'user_id',
    ];

    public function ordLimDes()
    {
        return $this->belongsTo(OrdLimDes::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
