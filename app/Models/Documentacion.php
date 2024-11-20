<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Documentacion extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'documentacions';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'codigo',
        'titulo',
        'descripcion',
        'tipo',
        'version',
        'estado',
        'fecha_creacion',
        'creador_id',
        'fecha_revision',
        'revisor_id',
        'fecha_aprobacion',
        'aprovador_id',
        'pdf_path',
        'word_path',
    ];
}
