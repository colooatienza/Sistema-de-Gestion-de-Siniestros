<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Configuracion;
use App\Producto;

class faltantesController extends Controller 
{
     public function mostrar(){
    	$polizas =  Poliza::listado();
        $rol = 'Administracion';
        $log = true;

        return view('polizas', [
        	"rol" => $rol, 
        	"logueado" => $log, 
        	"polizas" => $polizas]);
    }
}
