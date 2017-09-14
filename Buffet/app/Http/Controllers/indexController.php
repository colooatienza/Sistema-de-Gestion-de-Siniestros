<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Menu_del_dia;
use App\Configuracion;

class indexController extends Controller
{
    
    public function mostrar(){


    	$menu =  Menu_del_dia::listarMenus();

		$msj =  Configuracion::recuperarTitulo();
        
        return view('index', ["menu" => $menu, "mensaje" => $msj]);
    }
    
}
