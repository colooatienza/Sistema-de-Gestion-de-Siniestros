<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Compra;
use App\Configuracion;
use App\Egreso_Tipo;
use App\Egreso;
use App\Categoria;
use DateTime;

class gastoController extends Controller {

     public function mostrarListado(){
     	$porPagina = Configuracion::porPagina();
     	
    	$ventas =  Compra::gastosOrdenadosporFecha($porPagina);

        return view('gastosVista', [
        	"ventas" => $ventas, 
        	"agregado" => isset($_GET['agregado'])]);
    }

	 public function agregar(){
      $tipos= Egreso_Tipo::all();
      $categorias = Categoria::where('categoria_padre', null)->get();
      $exito=true;

      return view('agregarCompraVista', [
        	"tipos" => $tipos, 
        	"categorias" => $categorias, "exito"=>$exito]);
    }

    public function agregando(Request $request){
      $fecha=new DateTime(str_replace('/', '-', $request->fecha));
      $fecha= $fecha->format("Y-m-d");
      $compra = new Compra();
      $compra->proveedor = $request->proveedor;
      $compra->proveedor_cuit = $request->proveedor_cuit;
      $compra->fecha = $fecha;
      $compra->egreso_tipo = $request->tipo;
      $compra->borrado = 0;
      $compra->save();
      $egreso = new Egreso();
      $egreso->producto_id = $request->producto1;
      $egreso->cantidad = $request->cantidad1;
      $egreso->precio_unitario = $request->precio1;
      $egreso->compra_id = $compra->id;
      $egreso->save();
      $target = "../../uploads/".$compra->id;
      move_uploaded_file($_FILES['factura']['tmp_name'], $target);
      return redirect()->intended('/gastos?agregado=true');
    }

    public function mostrarDetalle($id){
      $compra = Compra::find($id);
      $egresos = Egreso::where("compra_id", $compra->id)->get();     
      return view('detalleCompra', ["egresos" => $egresos , "compra" => $compra]);
    }

     public function borrar($id){
        Compra::find($id)->delete();
        return redirect('gastos');  
    }
}