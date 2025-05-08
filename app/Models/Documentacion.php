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
    protected $appends = ['pdf_url'];


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
        'area',
        'version',
        'estado',
        'fecha_creacion',
        'creador_id',
        'fecha_revision',
        'revisor_id',
        'fecha_aprobacion',
        'aprovador_id',
        'documento_referenciado_id',
        'pdf_path',
        'word_path',
        'presentacion'
    ];


    // Relación con la misma tabla
    public function documentoReferenciado()
    {
        return $this->belongsTo(Documentacion::class, 'documento_referenciado_id');
    }

    // Relación con el usuario creador
    public function creador()
    {
        return $this->belongsTo(User::class, 'creador_id');
    }

    // Relación con el usuario revisor
    public function revisor()
    {
        return $this->belongsTo(User::class, 'revisor_id');
    }

    // Relación con el usuario aprobador
    public function aprovador()
    {
        return $this->belongsTo(User::class, 'aprovador_id');
    }
    public function getPdfUrlAttribute()
    {
        return route('documentos.ver', $this->id);
    }
}
