<?php

namespace App\Http\Controllers;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use App\Http\Requests;

use App\Venta;
use App\Ingreso_Tipo;


class detalleVentaController extends Controller{

     public function detalle($id){
     	
     	
    	
        $venta =  Venta::find($id);
        
        $ingreso = Venta::miIngreso($id);
        
        $ingresosParaVenta = Venta::ingresosParaVenta($id);
       
        
       
   

        return view('detalleVenta', ["venta" => $venta,"ingresosParaVenta" =>$ingresosParaVenta, "ingreso" =>$ingreso ]);
        
    }






}