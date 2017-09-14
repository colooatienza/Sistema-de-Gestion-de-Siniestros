<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Usuario;

class inhabilitarUsuario extends Controller
{
	function inhabilitar($idUsuario){
		$user = Usuario::inhabilitar($idUsuario);
		return redirect('usuarios');
	}
}
