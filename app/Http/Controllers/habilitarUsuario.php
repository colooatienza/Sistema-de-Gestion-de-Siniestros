<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Usuario;

class habilitarUsuario extends Controller
{
	function habilitar($idUsuario){
		 Usuario::habilitar($idUsuario);
		 return redirect('usuarios');
	}
}
