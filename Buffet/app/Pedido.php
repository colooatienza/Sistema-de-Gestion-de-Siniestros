<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $table='pedido';
    protected $fillable=['fecha', 'estado', 'usuario_id', 'cantMenues', 'observaciones'];


    public function usuario(){
    	return $this->belongsTo('App\Usuario');    	
    }


    public function pedidos_detalle(){
    	return $this->hasMany('App\Pedido_Detalle');    	
    }

    static public function pedidosOrdenadosPorFecha($porPagina){
     return Pedido::orderBy('fecha', 'DESC')->paginate($porPagina['valor']);
    }
}
