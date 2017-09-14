<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Configuracion;
use App\Producto;
use App\Categoria;
use App\Http\Requests\productoRequest;

class productosController extends Controller
{
     public function mostrarListado(){
     	$porPagina = Configuracion::porPagina();
     	
    	$productos =  Producto::productosOrdenadosporNombre($porPagina);

        return view('productos', [
        	"productos" => $productos, 
        	"agregado" => isset($_GET['agregado'])]);
    }

     public function mostrarAgregar(){
        $categorias = Categoria::where('categoria_padre', null)->get();
        return view('agregarProducto', [
            "categorias" => $categorias
            ]);
    }

    public function agregar(productoRequest $request){
        $producto = new Producto();
        $producto->nombre = $request->nombre;
        $producto->marca = $request->marca;
        $producto->stock = $request->stock;
        $producto->stock_minimo = $request->stockMinimo;
        $producto->categoria_id = $request->categoria;
        $producto->proveedor = $request->proveedor;
        $producto->precio = $request->precio;
        $producto->descripcion = $request->descripcion;
        $producto->descuentaStock = $request->descuenta=='on';
        $producto->fecha_alta = date('Y-m-d');
        $producto->save();
        return redirect('productos');
    }


    public function borrar($id){
        Producto::find($id)->delete();
        return redirect('productos');
        
    }
    public function editar($id){

        $producto=Producto::find($id);
        $categorias = Categoria::where('categoria_padre', null)->get();
        $subCategorias=Categoria::subCategoria($producto->categoria->categoria_padre);
        $cambios = false; 
    
        return view('editarProducto', ["producto"=>$producto, "categorias"=>$categorias, "subCategorias"=>$subCategorias, "cambios" => $cambios]);
    }

    public function editando(productoRequest $request){

        $producto=Producto::editar($request);
       
        $categorias = Categoria::where('categoria_padre', null)->get();
     
        $subCategorias=Categoria::subCategoria($producto->categoria->categoria_padre);
        $cambios = true; 
    
        return view('editarProducto', ["producto"=>$producto, "categorias"=>$categorias, "subCategorias"=>$subCategorias, "cambios" => $cambios]);

   
       
    }
    public function getProductos($idCategoria){
    	$html="<option selected>Seleccione producto</option>";
    	$productos=Producto::productoPorCategoria($idCategoria);
    	foreach ($productos as $producto) {
        	$html.="<option value='".$producto->id."'>".$producto->nombre."</option>";
    	}
    	return $html;
    }

    public function getPrecioProducto($id){
    	$producto=Producto::precioProducto($id);
        $precio = $producto->precio;
    	return $precio;
    }

}
