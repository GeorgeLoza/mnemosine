<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;
    protected $fillable = ['codigio', 'nombre', 'categoria', 'destino'];

    public function receta()
    {
        return $this->hasMany(Receta::class);
    }

    public function orp()
    {
        return $this->hasMany(Orp::class);
    }
}
