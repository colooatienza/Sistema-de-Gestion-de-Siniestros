<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Configuracion;
use App\Usuario;
use App\Ubicacion;

class usuariosController extends Controller
{

    public function registrar(Request $request){
      if(Usuario::nombreDisponible2($request->input('usuario'))){
          Usuario::agregar($request);
          return redirect('login');
       }
       else{
        return redirect('registrarse');

       }
  }

    public function nombreDisponible($nombre){
      return Usuario::nombreDisponible2($nombre);
  }
     public function mostrar(){
     	$porPagina = Configuracion::porPagina();
     	
        
    	$usuarios = Usuario::usuarios($porPagina); 
        $rol = 'ADMINISTRADOR';
        $log = true;

        return view('usuarios', [
        	"rol" => $rol, 
        	"logueado" => $log, 
        	"usuarios" => $usuarios, 
        	"agregado" => isset($_GET['agregado'])]);
    }

    public function registrarse(){
      
        
      $ubicaciones = Ubicacion::get();

        return view('agregarUsuarioOnline', [
          "ubicaciones" => $ubicaciones
        ]);
    }

    public function borrarUsuario($idUsuario){

        $user = Usuario::borrar($idUsuario);
        return redirect('usuarios');
    }
   /* public function agregar(Request $request){



          Usuario::agregar($request);
          return redirect('');
    }*/
}
