<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SeleccionVisual extends Model
{
    use HasFactory;

    protected $fillable = [
        'tiempo',
        'orp_id',
        'color_corteza',
        'color_base',
        'aspecto_miga',
        'deformidad_corte',
        'agujero_aire',
        'huecos_desgrane',
        'insuficiencia_ajonjoli',
        'exceso_ajonjoli',
        'arrugas_superficie',
        'globos_superficie',
        'harina_base',
        'simetria',
        'hundimiento_base',
        'presencio_beso',
        'total_nerma',
        'user_id',
        'responsable',
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

    /**
     * Relación con el usuario que creó el registro.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Relación con el usuario responsable.
     */
    public function responsable()
    {
        return $this->belongsTo(User::class, 'responsable');
    }

}
