<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receta extends Model
{
    use HasFactory;

    protected $fillable = ['producto_id', 'item_id', 'cantidad', 'etapa'];

    public function producto()
    {
        return $this->belongsTo(Producto::class);
    }

    public function item()
    {
        return $this->belongsTo(Item::class);
    }
}
