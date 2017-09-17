<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Cobertura extends Authenticatable
{
    protected $table = 'cobertura';

    protected $fillable = [  'descripcion', 'ramo' ];

    public $timestamps = false;

    public function poliza(){
        return $this->hasMany('App\Poliza');
    }

     public function ramo(){
        return $this->belongsTo('App\Ramo');
    }

}


