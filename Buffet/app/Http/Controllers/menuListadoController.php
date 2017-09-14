<?php

namespace App\Http\Controllers;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Configuracion;
use App\Producto;
use App\Menu_del_dia;
use DateTime;


class menuListadoController extends Controller{


  public function mostrarListado(){
	$porPagina = Configuracion::porPagina();
	$menus =  Menu_del_dia::menusOrdenadosPornombre($porPagina);
  //var_dump($menus);
	return view('menuListado', ["menus" => $menus, 'agregado' => isset($_GET['agregado'])]);
     }


  public function editar($id){

  	$menu = Menu_del_dia::find($id);
    $exito = false;

  	return view('editarMenu', ["menu"=>$menu,"exito"=>$exito]) ;
  } 

   public function editando(Request $request){
     
  	$menu = Menu_del_dia::find( $request->input('id'));
  	$stockMin= $menu->producto->stock_minimo;
  	$stockActual = $menu->producto->stock;
  	Menu_del_dia::editar($request);
      $exito = true;
      $menu = Menu_del_dia::find( $request->input('id'));
      

    return view('editarMenu', ["menu"=>$menu,"exito"=>$exito]) ;
   
    }
    
    public function agregarMenu(){
      $porPagina = Configuracion::porPagina();
      $productos = Producto::getListadoConMinimo($porPagina);
      return view('seleccionarMenuVista',['productos' => $productos, 'agregado' => isset($_GET['agregado'])]);
    }

    public function crearMenu($id){
      $producto = Producto::crearMenu($id);
      return view('menuSeleccionadoVista',['producto' => $producto]);
    }

    public function agregandoMenu($id, Request $request){
        $fecha=new DateTime(str_replace('/', '-', $request->input('fecha')));
        $fecha= $fecha->format("Y-m-d");
        $menu = new Menu_del_dia();
        $menu->producto_id = $id;
        $menu->fecha = $fecha;
        $menu->borrado = 0;
        $menu->cant = $request->input('cant');
        $menu->save();
        return redirect()->intended('/menuListado?agregado=true');
    }

     public function mostrarMenuDelDia(){
        $menu =  Menu_del_dia::listarMenus();
        $exito = false;
        return view('menuDelDia', ["menu"=>$menu, "exito" => $exito]);
     }    
}