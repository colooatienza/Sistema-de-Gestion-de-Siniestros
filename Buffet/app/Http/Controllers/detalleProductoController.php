<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

use App\Producto;


class detalleProductoController extends Controller{

     public function detalle($id){
     	
     	
    	$categoria =  Producto::micategoria($id);
        $producto =  Producto::find($id);
    

        return view('detalleProducto', ["producto" => $producto,"categoria" => $categoria ]);
    }






}