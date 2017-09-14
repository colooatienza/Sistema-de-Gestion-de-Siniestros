<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ubicacion extends Model
{
    protected $table = 'ubicacion';

    protected $fillable = [
        'nombre', 'descripcion',
    ];

    public function usuarios(){
        return $this->hasMany('App\Usuario');
    }

    static public function recuperarPorNombre() {
    	return Ubicacion::orderBy('nombre')->get();
    }
}
