<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DivisionFormadoDecorado extends Model
{
    use HasFactory;
    //
    protected $fillable = [
        'tiempo',
        'preparacion',
        'orp_id',
        'peso_crudo1',
        'peso_crudo2',
        'peso_crudo3',
        'peso_crudo4',
        'peso_ajonjoli1',
        'peso_ajonjoli2',
        'peso_ajonjoli3',
        'peso_ajonjoli4',
        'centreado',
        'uniformidad',
        'homogeneidad',
        'user_id',
        'responsable_pintado',
        'responsable_decorado',
        'observaciones',
        'correccion',
    ];

    public function orp()
    {
        return $this->belongsTo(Orp::class, 'orp_id');
    }

    /**
     * Relación con el modelo User para el usuario general.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Relación con el modelo User para el responsable de pintado.
     */
    public function responsablePintado()
    {
        return $this->belongsTo(User::class, 'responsable_pintado');
    }

    /**
     * Relación con el modelo User para el responsable de decorado.
     */
    public function responsableDecorado()
    {
        return $this->belongsTo(User::class, 'responsable_decorado');
    }

}
