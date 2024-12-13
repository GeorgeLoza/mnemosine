<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orp extends Model
{
    use HasFactory;

    protected $fillable = ['codigo', 'producto_id', 'lote', 'estado', 'tiempo_produccion', 'tiempo_elaboracion', 'fecha_vencimiento1', 'fecha_vencimiento2'];

    public function producto()
    {
        return $this->belongsTo(Producto::class);
    }

    public function premezclas1()
    {
        return $this->hasMany(Premezcla1::class);
    }

    public function premezclas2()
    {
        return $this->hasMany(Premezcla2::class);
    }

    public function premezclas3()
    {
        return $this->hasMany(Premezcla3::class);
    }

    public function preparadorMaestro()
    {
        return $this->hasMany(PreparadorMaestro::class);
    }
    public function amasado()
    {
        return $this->hasMany(Amasado::class);
    }
}
