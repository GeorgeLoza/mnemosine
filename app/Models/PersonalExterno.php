<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PersonalExterno extends Model
{
    protected $fillable = [
        'tiempo',
        'user_id',
        'visita',
        'areaInstitucion',
        'motivo',
        'uniforme',
        'higiene',
        'salud',
        'objetos_extranos',
        'observaciones',
        'correccion',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
