<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VerificacionHerramienta extends Model
{
    use HasFactory;

    protected $fillable = [
        'tiempo',
        'orden_trabajo_id',
        'herramienta',
        'cantidad_ingreso',
        'user_ingreso',
        'cantidad_salida',
        'user_salida',
        'observaciones'
    ];

    public function orden_trabajo()
    {
        return $this->belongsTo(OrdenTrabajo::class);
    }

    public function userIngreso()
     {
         return $this->belongsTo(User::class, 'user_ingreso');
     }

     public function userSalida()
     {
         return $this->belongsTo(User::class, 'user_salida');
     }
}
