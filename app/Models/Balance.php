<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Balance extends Model
{
    use HasFactory;

    protected $fillable = [
        'tiempo',
        'orp_id',
        'preparacion',
        'cantidad',
        'user_id',
        'observaciones',
        'correccion',
    ];

    public function orp()
    {
        return $this->belongsTo(Orp::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
