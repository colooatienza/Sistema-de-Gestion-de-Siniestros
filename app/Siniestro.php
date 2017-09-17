<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Siniestro extends Authenticatable
{
    protected $table = 'siniestro';

    protected $fillable = [  'poliza', 'fecha', 'estado'   ];

    public $timestamps = false;

    protected $dates = ['fecha'];

    public function polizaObject(){
        return $this->belongsTo('App\Poliza', 'id');
    }

     static public function siniestros(){
         return Siniestro::get();
     }
}


