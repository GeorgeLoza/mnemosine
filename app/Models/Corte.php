<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Corte extends Model
{
    
    use HasFactory;

    protected $fillable = [
        'tiempo',
        'orp_id',
        'preparacion',
        'temperatura_corte',
        'calibracion',
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
