<?php

namespace App;
use App\Venta;
use Illuminate\Database\Eloquent\Model;

class Ingreso_Tipo extends Model
{
    protected $table='ingreso_tipo';
    protected $fillable=['nombre'];

    public function ventas(){
        return $this->hasMany('App\Venta');
    }


   
   
}
