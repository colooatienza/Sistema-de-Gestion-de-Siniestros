<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Poliza extends Authenticatable
{
    protected $table = 'poliza';

    protected $fillable = [  'cliente', 'cobertura', 'precio', 'fechainicio'   ];

    public $timestamps = false;

    protected $dates = ['fechainicio'];

    public function coberturaObject(){
        return $this->belongsTo('App\Cobertura', 'id');
    }

     public function clienteObject(){
        return $this->belongsTo('App\Usuario', 'id');
    }

     static public function polizas(){
         return Poliza::get();
     }
}


