<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Usuario extends Authenticatable
{
    use SoftDeletes;
    protected $table = 'usuario';

    protected $fillable = ['usuario', 'password', 'nombre', 'apellido', 'dni', 'email', 'telefono', 'rol_id', 'habilitado'];

    public $timestamps = false;
     protected $hidden = [
        'password', 'remember_token',
    ];
    protected $dates = ['deleted_at'];

    public function rol(){
        return $this->belongsTo('App\Rol');
    }

    public function polizas(){
        return $this->hasMany('App\Poliza');
    }
    /*
     static public function usuarios($porPagina){
         return Usuario::orderBy('usuario')->paginate($porPagina['valor']);
     }


     static public function habilitar($idUsuario){
        $user = Usuario::find($idUsuario);
        $user->habilitado = true;
        $user->save();
       
    }


    static public function borrar($idUsuario){
        $user = Usuario::find($idUsuario);
        $user->delete();
       
    }

    static public function inhabilitar($idUsuario){
        $user = Usuario::find($idUsuario);
        $user->habilitado = false;
        $user->save();
    }

    static public function nombreDisponible($idUsuario, $nombre){
        $user = Usuario::where([
            ['usuario', '=', $nombre],
            ['id', '<>', '$idUsuario'],
        ])->get();
        return $user->count()==0;
    }

    static public function nombreDisponible2($nombre){
        $user = Usuario::where('usuario', '=', $nombre)->get();
        return $user->count()==0;
    }

    static public function editar($request){


        $usuario = Usuario::find($request->input('id')); 
        $usuario->nombre = $request->input('nombre');
        $usuario->usuario = $request->input('usuario');
        $usuario->apellido = $request->input('apellido');
        $usuario->dni = $request->input('dni');
        $usuario->email = $request->input('email');
        $usuario->telefono = $request->input('telefono');
        $usuario->rol_id = $request->input('rol');
        $usuario->ubicacion_id = $request->input('ubicacion');
        $usuario->save();
    }

    static public function agregar($request){


        $usuario = new Usuario(); 
        $usuario->nombre = $request->input('nombre');
        $usuario->usuario = $request->input('usuario');
        $usuario->apellido = $request->input('apellido');
        $usuario->password = $request->input('clave');
        $usuario->dni = $request->input('dni');
        $usuario->email = $request->input('email');
        $usuario->telefono = $request->input('telefono');
        $usuario->rol_id = $request->input('rol');
        $usuario->ubicacion_id = $request->input('ubicacion');
        $usuario->save();
    }
    */
}


