<?php

namespace App\Models;

use App\Models\Venta;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Sucursale extends Model
{
    use HasFactory;

    protected $fillable =['nombre','telefono','direccion','descripcion'];

    public function ventas()
    {
        return $this->hasMany(Venta::class);
    }
}

