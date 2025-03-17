<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sustancia extends Model
{
    use HasFactory;

    protected $fillable = ['codigo', 'nombre', 'detalle', 'unidad', 'observaciones'];

    public function movimientos()
    {
        return $this->hasMany(SustanciasMov::class);
    }
}
