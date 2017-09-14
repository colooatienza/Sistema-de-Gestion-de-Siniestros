<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

use App\Configuracion;
use App\Pedido;

class pedidosController extends Controller
{
    
     public function mostrar(){
     	$porPagina = Configuracion::porPagina();
     	
    	$pedidos =  Pedido::pedidosOrdenadosPorFecha($porPagina);
        $rol = 'Administracion';
        $log = true;

        return view('pedidos', [
        	"rol" => $rol, 
        	"logueado" => $log, 
        	"pedidos" => $pedidos]);
    }
}
