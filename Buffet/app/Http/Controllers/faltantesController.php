<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Configuracion;
use App\Producto;

class faltantesController extends Controller 
{
     public function mostrar(){
     	$porPagina = Configuracion::porPagina();
     	
    	$productos =  Producto::productos($porPagina);
        $rol = 'Administracion';
        $log = true;

        return view('faltantes', [
        	"rol" => $rol, 
        	"logueado" => $log, 
        	"productos" => $productos]);
    }
}
