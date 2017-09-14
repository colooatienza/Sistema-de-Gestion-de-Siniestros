<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Producto;
use App\Venta;

use Illuminate\Support\Facades\DB;


class Ingreso extends Model
{
    protected $table='ingreso';
    protected $fillable=['producto_id', 'cantidad', 'precio_unitario', 'venta_id'];

    public function producto(){
    	return $this->belongsTo('App\Producto');   

    }

    public function venta(){
    	return $this->belongsTo('App\Venta');    	
    }

     static public function getCantVentas($inicial,$final){
      $sql = DB::table('ingreso')
            ->join('venta', 'venta.id', '=', 'ingreso.venta_id')
            ->join('producto', 'producto.id', '=', 'ingreso.producto_id')
            ->select('producto.*',DB::raw('SUM(ingreso.cantidad) as cantidad'))
            ->whereBetween('venta.fecha', [$inicial, $final])
            ->groupBy('producto.id')
            ->get();
     return $sql;
     }

   static public function getIngresos($inicial,$final){
     $ingresos = DB::table('ingreso')
              ->select('venta.fecha',DB::raw('SUM(ingreso.precio_unitario*ingreso.cantidad) as cantidad')) 
              ->join('venta', 'venta.id', '=', 'ingreso.venta_id')
              ->whereBetween('venta.fecha', [$inicial, $final])
              ->groupBy('venta.fecha') 
              ->orderBy('venta.fecha','desc');
    return $ingresos;
   }
   static public function getEgresos($inicial,$final){
    $egresos = DB::table('egreso') 
               ->select('compra.fecha',DB::raw('-SUM(egreso.precio_unitario*egreso.cantidad) as cantidad'))  
               ->join('compra', 'compra.id', '=', 'egreso.compra_id') 
               ->whereBetween('compra.fecha', [$inicial, $final])
               ->groupBy('compra.fecha') 
               ->orderBy('compra.fecha','desc');
    return $egresos;
   }
    static public function getGanancias($inicial,$final){
     $first = Ingreso::getIngresos($inicial,$final);
     $second = Ingreso::getEgresos($inicial,$final);
     $sql = $first->unionAll($second)
            ->groupBy('fecha')
            ->orderBy('fecha','desc')
            ->get();
     return $sql;
    }
}
