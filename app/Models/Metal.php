<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Metal extends Model
{
    use HasFactory;

    protected $fillable = [
        'tiempo',
        'orp_id',
        'preparacion',
        'ferroso',
        'no_ferroso',
        'sus_inox',
        'user_id',
        'responsable',
        'observaciones',
        'correccion',
    ];

    public function orp()
    {
        return $this->belongsTo(Orp::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function responsable()
    {
        return $this->belongsTo(User::class, 'responsable');
    }
}
