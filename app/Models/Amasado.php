<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Amasado extends Model
{
    use HasFactory;

    protected $fillable = [
        'tiempo',
        'preparacion',
        'orp_id',
        'tiempo_amasado1',
        'tiempo_amasado2',
        'temperatura',
        'user_id',
        'responsable',
        'observaciones',
        'correccion',
    ];

     // Relaciones
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
