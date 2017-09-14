<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Configuracion extends Model
{
    protected $table='configuracion';
    protected $fillable=['clave', 'valor'];

    static public function porPagina(){
        
        return Configuracion::where('clave', 'elementos')->first();
    }


    static public function recuperarTitulo(){


    	return  Configuracion::where('clave', 'titulo')->first();
        
    }
    static public function obtenerDatos(){


    	$rows =  Configuracion::all();
    	foreach($rows as $item){
    		$datos[$item->clave]=$item->valor;
    	}
    	return $datos;
    }
}
