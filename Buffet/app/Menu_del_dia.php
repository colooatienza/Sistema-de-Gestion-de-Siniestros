<?php

namespace App;
use App\Producto;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Database\Eloquent\Collection;
use Carbon\Carbon;


class Menu_del_dia extends Model
{
    protected $table='menu_del_dia';
    protected $fillable=['producto_id', 'fecha', 'borrado', 'cant',];
    public $timestamps = false;

    public function producto(){
    
    	return $this->belongsTo('App\Producto');    	
    }
    static public function listarMenus(){
    return Menu_del_dia::where('fecha', date('Y-m-d'))->get();
    }

    static public function menusOrdenadosPornombre($porPagina){

    return Menu_del_dia::orderby('fecha')->paginate($porPagina['valor']);


    }

    static public function editar($request){
       $menu= Menu_del_dia::find($request->input('id'));
      $menu->cant = $request->input('cant');
       //$fecha= $request->input('fecha');
          $fecha=Carbon::parse($request->input('fecha'))->format('Y-m-d');  
      $menu->fecha =$fecha;
     // var_dump($menu->fecha); 
      $menu->save();
       //$producto = Producto::find($menu->producto_id);
       //$producto->stock = ($menu->producto->stock)-(($menu->producto->stock)-($request->input('cant')));
        //$producto->save();
      //$menu->save();
    }
}
