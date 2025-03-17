<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evacuacion extends Model
{
    use HasFactory;

    protected $fillable = [
        'tiempo',
        'turno',
        'user_id',
        'zunino',
        'molde',
        'hiline',
        'reposteria',
        'bk',
        'grissin',
        'hornos',
        'codificado',
        'embolsado_t1',
        'embolsado_t2',
        'embolsado_pan_molde',
        'embolsado_bk',
        'embolsado_reposteria',
        'embolsado_grissin',
        'observacion',
        'correcion',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
