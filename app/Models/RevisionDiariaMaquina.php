<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RevisionDiariaMaquina extends Model
{
    use HasFactory;


    protected $fillable = [
        'maquina_equipo_id',
        'tiempo',
        'estado',
        'observaciones',
        'correccion',
    ];

    public function maquinaEquipo()
    {
        return $this->belongsTo(MaquinaEquipo::class, 'maquina_equipo_id');
    }
}
