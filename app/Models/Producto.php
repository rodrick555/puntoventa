<?php

namespace App\Models;

use App\Models\Proveedore;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Producto extends Model
{
    use HasFactory;
    protected $fillable =['nombre','tipo','descripcion','image','proveedore_id'];

    public function proveedore()
    {
        return $this->belongsTo(Proveedore::class);
    }

    public function setNombrettribute($value)
    {
        $this->attributes["nombre"]= ucwords(strtolower($value));
    }
    public function setTipoAttribute($value)
    {
        $this->attributes["tipo"]= ucwords(strtolower($value));
    }
    public function setDescripcionAttribute($value)
    {
        $this->attributes["descripcion"]= ucwords(strtolower($value));
    }
    
}
