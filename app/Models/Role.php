<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Role extends Model
{
    use HasFactory;

    protected $fillable =['nombre','tipo','descripcion'];

    public function users()
    {
        return $this->hasMany(User::class);
    }
    public function setNombreAttribute($value)
    {
        $this->attributes["nombre"]= ucwords(strtolower($value));
    }
    public function setTipoAttribute($value)
    {
        $this->attributes["tipo"]= ucwords(strtolower($value));
    }
    public function setDescripcionAttribute($value)
    {
        $this->attributes["descripcion"]= ucfirst(strtolower($value));;
    }
}

