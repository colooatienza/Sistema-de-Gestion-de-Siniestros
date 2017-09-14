<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Egreso_Tipo extends Model
{
    protected $table='egreso_tipo';
    protected $fillable=['nombre'];

    public function compras(){
    	return $this->hasMany('app\Compra.php');    	
    }
}
