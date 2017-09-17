<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Ramo extends Authenticatable
{
    protected $table = 'ramo';

    protected $fillable = [  'descripcion' ];

    public $timestamps = false;


    public function cobertura(){
        return $this->hasMany('App\Cobertura');
    }


}


