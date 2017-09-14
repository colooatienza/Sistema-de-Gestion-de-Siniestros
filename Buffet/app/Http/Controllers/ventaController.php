<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Venta;
use App\Configuracion;
use App\Ingreso_Tipo;
use App\Categoria;

class ventaController extends Controller {

     public function mostrarListado(){
     	$porPagina = Configuracion::porPagina();
     	
    	$ventas =  Venta::ventasOrdenadosporFecha($porPagina);

        return view('ventasVista', [
        	"ventas" => $ventas, 
        	"agregado" => isset($_GET['agregado'])]);
    }

    public function agregar(){
       $tipos= Ingreso_Tipo::all();
      $categorias = Categoria::where('categoria_padre', null)->get();
      $exito=true;

      return view('agregarVenta', [
        	"tipos" => $tipos, 
        	"categorias" => $categorias, "exito"=>$exito]);
       

    }

}