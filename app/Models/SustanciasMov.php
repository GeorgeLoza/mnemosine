<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SustanciasMov extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'sustancia_id', 'tiempo', 'tipo', 'cantidad','saldo', 'area', 'observaciones'];

    public function sustancia()
    {
        return $this->belongsTo(Sustancia::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
