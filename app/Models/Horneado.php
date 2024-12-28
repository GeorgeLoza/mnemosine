<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Horneado extends Model
{
    use HasFactory;


    protected $fillable = [
        'tiempo',
        'preparacion',
        'orp_id',
        'verificacion_corte',
        'nhorno',
        'tiempo_horneado',
        'temperatura',
        'temperatura_nucleo',
        'user_id',
        'responsable',
        'observaciones',
        'correccion',
    ];

    public function orp()
    {
        return $this->belongsTo(Orp::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function responsable()
    {
        return $this->belongsTo(User::class, 'responsable');
    }
}
