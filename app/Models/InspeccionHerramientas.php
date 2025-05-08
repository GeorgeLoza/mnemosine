<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InspeccionHerramientas extends Model
{
    

    protected $fillable = [
        'herramienta_id',
        'tiempo',
        'cantidad',
        'observaciones',
    ];
    protected $dates = ['tiempo'];
    public function herramienta()
    {
        return $this->belongsTo(Herramienta::class);
    }
}
