<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedido_Detalle extends Model
{
    protected $table='pedido_detalle';
    protected $fillable=['pedido_id', 'producto_id', 'cant', 'precio'];


    public function pedido(){
    	return $this->belongsTo('app\Pedido.php');    	
    }


    public function producto(){
    	return $this->belongsTo('app\Producto.php');    	
    }
}
