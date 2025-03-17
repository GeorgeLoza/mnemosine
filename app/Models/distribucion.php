<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class distribucion extends Model
{
    use HasFactory;

    protected $fillable = [
        'tiempo',
        'orp_id',
        'razon_social',
        'ubicacion',
        'cantidad',
        'observaciones',
        'correccion',
    ];

    /**
     * Relación con la tabla ORP.
     */
    public function orp()
    {
        return $this->belongsTo(Orp::class);
    }
}
