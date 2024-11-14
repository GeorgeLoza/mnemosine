<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class HigienePersonal extends Model
{
    use HasFactory;

    protected $fillable = [
        'supervisor_id',
        'trabajador_id',
        'tiempo',
        'uniforme',
        'higiene',
        'salud',
        'objetos_extranos',
        'observaciones',
        'correccion',
    ];

     // Relación con el modelo User para el supervisor
     public function supervisor()
     {
         return $this->belongsTo(User::class, 'supervisor_id');
     }

     // Relación con el modelo User para el trabajador
     public function trabajador()
     {
         return $this->belongsTo(User::class, 'trabajador_id');
     }
}
