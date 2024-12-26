<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Decorado extends Model
{
    use HasFactory;

    protected $fillable = [
        'orp_id',
        'tiempo',
        'user_id',
        'responsable',
        'huevo',
        'semilla',
        'polenta',
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
        return $this->belongsTo(User::class, 'reponsable');
    }
}
