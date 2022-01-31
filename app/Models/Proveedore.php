<?php

namespace App\Models;

use App\Models\Producto;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Proveedore extends Model
{
    use HasFactory;
    protected $fillable =['nombre','telefono','direccion','descripcion'];



    public function productos()
    {
        return $this->hasMany(Producto::class);
    }

    public function setNombreAttribute($value)
    {
        $this->attributes["nombre"]= ucwords(strtolower($value));
    }
    public function setDireccionAttribute($value)
    {
        $this->attributes["direccion"]= ucwords(strtolower($value));
    }
    public function setDescripcionAttribute($value)
    {
        $this->attributes["descripcion"]= ucfirst(strtolower($value));;
    }
}
