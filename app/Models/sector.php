<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sector extends Model
{
    protected $fillable = [
        'codigo',
        'nombre',
    ];
    public function ordLimDes()
    {
        return $this->hasMany(OrdLimDes::class);
    }
}
