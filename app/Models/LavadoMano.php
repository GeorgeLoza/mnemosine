<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LavadoMano extends Model
{

    use HasFactory;

    protected $fillable = [
        'tiempo',
        'user_id',

    ];

     // Relación con el modelo User para el supervisor
     public function user()
     {
         return $this->belongsTo(User::class);
     }


}
