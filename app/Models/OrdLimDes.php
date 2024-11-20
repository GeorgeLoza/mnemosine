<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrdLimDes extends Model
{
    protected $fillable = [
        'nombre',
        'sector_id',
        'lunes_lo',
        'lunes_des',
        'martes_lo',
        'martes_des',
        'miercoles_lo',
        'miercoles_des',
        'jueves_lo',
        'jueves_des',
        'viernes_des_pro',
        'sabado_lo',
        'sabado_des',
        'domingo_lo',
        'domingo_des',
    ];

    public function sector()
    {
        return $this->belongsTo(sector::class);
    }
}
