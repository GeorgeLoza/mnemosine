<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dimension extends Model
{
    use HasFactory;

    protected $fillable = [
        'orp_id',
        'preparacion',
        'altura_total',
        'diametro',
        'altura_base',
        'altura_feta_centro',
        'altura_split',
        'ancho_split',
        'peso',
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
