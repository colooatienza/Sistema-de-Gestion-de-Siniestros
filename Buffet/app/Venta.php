<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Producto;
use App\Ingreso;
use App\Ingreso_Tipo;
class Venta extends Model
{
    protected $table = 'venta';

    protected $fillable = [
        'ingreso_tipo', 'fecha', 'descripcion', 'borrado',
    ];
    public $timestamps = false;

    public function ingresos(){
        return $this->hasMany('App\Ingreso');

    }

    public function ingreso_tipo(){
        return $this->belongsTo('App\Ingreso_Tipo');
    }

    static public function ventasOrdenadosporFecha($porPagina){
      $sql = DB::table('venta')
            ->join('ingreso', 'venta.id', '=', 'ingreso.venta_id')
            ->select('venta.*',DB::raw('SUM(ingreso.precio_unitario*ingreso.cantidad) as monto'))
            ->groupBy('venta.id')
            ->orderBy('fecha')
            ->paginate($porPagina['valor']);
     return $sql;
     }


    static public function ingresosParaVenta($id){

       $sql = DB::table('venta')->join('ingreso', 'venta.id', '=', 'ingreso.venta_id')->join('producto', 'producto.id','=', 'ingreso.producto_id')->where('ingreso.venta_id', $id)->get();     
    
        return $sql;


        $user = DB::table('users')->where('name', 'John')->first();
       
        }

     static public function producto($id){    
       $producto =  Venta::ingreso($id)->producto();
        return $producto;
         }

      static public function nombreIngreso($id){
         $ingreso = Venta::find($id)->ingreso_tipo();
         return $ingreso;

      } 
      static public function miIngreso($id){

        $numIngreso =  Venta::find($id)->ingreso_tipo;
        $ingreso = Ingreso_Tipo::find($numIngreso);
        return $ingreso;
    }     
}
