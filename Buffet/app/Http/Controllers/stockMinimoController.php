<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Configuracion;
use App\Producto;

class stockMinimoController extends Controller
{
     public function mostrar(){
     	$porPagina = Configuracion::porPagina();
     	
    	$productos = Producto::productosStockMinimo($porPagina);


         
        $rol = 'ADMINISTRADOR';
        $log = true;

        return view('stockMinimo', [
        	"rol" => $rol, 
        	"logueado" => $log, 
        	"productos" => $productos]);
    }
}
