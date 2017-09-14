<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Producto;

class Egreso extends Model
{
    protected $table='egreso';
    protected $fillable=['producto_id', 'cantidad', 'precio_unitario', 'compra_id'];
    public $timestamps = false;

    public function producto(){
    	return $this->belongsTo('App\Producto');
    }
    public function compra_id(){
    	return $this->belongsTo('App\Compra');
    }
}
