<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Herramienta extends Model
{
    use HasFactory;

    protected $fillable = [
        'item',
        'marca',
        'detalle',
        'ultima_compra',
        'observaciones',

    ];

    public function inspecciones()
    {
        return $this->hasMany(InspeccionHerramientas::class);
    }
}
