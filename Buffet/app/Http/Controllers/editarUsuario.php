<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Usuario;
use App\Ubicacion;

class editarUsuario extends Controller
{     
	public function mostrar($idUsuario, $exito = null, $nodisponible = null){
     	
        
    	$usuario = Usuario::find($idUsuario); 
    	$ubicaciones = Ubicacion::recuperarPorNombre();
        return view('editarUsuario', [
        	"usuario" => $usuario, 
        	"ubicaciones" => $ubicaciones, 
        	"nodisponible" => $nodisponible, 
        	"exito" => $exito
        	]);
    }

	public function editar(Request $request){
		if(Usuario::nombreDisponible($request->input('id'), $request->input('usuario'))){
          Usuario::editar($request);
    	  return redirect('editarUsuario/'.$request->input('id').'/1');
    	 }
    	 else{
    	  return redirect('editarUsuario/'.$request->input('id').'/0/1');

    	 }
	}
}
