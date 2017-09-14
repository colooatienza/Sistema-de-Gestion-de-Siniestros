<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Ingreso;
use App\Engreso;
use App\Venta;

use App\Producto;
use App\Categoria;

use Illuminate\Database\Eloquent\SoftDeletes;

class Producto extends Model
{
    use SoftDeletes;
    protected $table='producto';

    protected $fillable=['nombre', 'marca', 'stock', 'stock_minimo', 'categoria_id', 'proveedor', 'precio', 'descripcion', 'fecha_alta', 'descuentaStock'];

    public $timestamps = false;

    protected $dates = ['deleted_at'];

    public function egresos(){
    	return $this->hasMany('App\Egreso');    	
    }

    public function ingresos(){
    	return $this->hasMany('App\Ingreso');    	
    }

    public function menues_del_dia(){
    	return $this->hasMany('App\Menu_del_dia');    	
    }


    public function categoria(){
    	return $this->belongsTo('App\Categoria');    	
    }

    public function pedidos_detalle(){
    	return $this->hasMany('App\Pedido_Detalle');    	
    }

    static public function productos($porPagina){
       return Producto::where('stock', 0)->paginate($porPagina['valor']);
    }

    static public function productosOrdenadosporNombre($porPagina){
        return Producto::orderBy('nombre')->paginate($porPagina['valor']);
     }
    
    static public function productosStockMinimo($porPagina){
        return Producto::whereRaw('stock < stock_minimo')->paginate($porPagina['valor']);
    }

    static public function miCategoria($id){

       $categoria =  Producto::find($id)->categoria;
        
        return $categoria;
    }
    static public function editar($request){

        $producto = Producto::find($request->input('id'));
        $producto->nombre = $request->input('nombre');
        $producto->marca = $request->input('marca');
        $producto->stock = $request->input('stock');
        $producto->stock_minimo = $request->input('stockMinimo');
        $producto->categoria_id = $request->categoria;
        $producto->proveedor = $request->proveedor;
        $producto->precio = $request->precio;
        $producto->descripcion = $request->descripcion;
        $producto->descuentaStock = $request->descuenta=='on';
        $producto->fecha_alta = date('Y-m-d');
        $producto->save(); 
        return $producto;
    }

    static public function getListadoConMinimo($porPagina){
        return Producto::whereRaw('stock > 30')->paginate($porPagina['valor']);
    }
    
    static public function crearMenu($id){

       $producto =  Producto::find($id);
        
        return $producto;
    }
    
    static public function productoPorCategoria($id){

       $producto =  Producto::where('categoria_id',$id)->get();
        
        return $producto;
    }

    static public function precioProducto($id){

       $producto =  Producto::find($id);
        
        return $producto;
    }
}
