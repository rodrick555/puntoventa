<?php

namespace App\Models;

use App\Models\User;
use App\Models\Sucursale;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Venta extends Model
{
    use HasFactory;

    protected $fillable = [
        'precio',
        'cantidad',
        'fecha',
        'user_id',
        'sucursale_id'
        
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function sucursale()
    {
        return $this->belongsTo(Sucursale::class);
    }
}
