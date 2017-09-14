<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Html\HtmlServiceProvider;
use App\Http\Requests;
use App\Configuracion;

class configuracionController extends Controller
{
	     public function mostrar(){
     	
    	$datos =  Configuracion::obtenerDatos();
        $rol = 'Administracion';
        $log = true;

        return view('configuracion', [
        	"rol" => $rol, 
        	"logueado" => $log, 
        	"datos" => $datos, 
        	"guardado" => isset($_GET['guardado'])
        	]);
    }

    public function update()
    {
    	/*
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
        ]);

        Item::find($id)->update($request->all());
        return redirect()->route('itemCRUD.index')
                        ->with('success','Item updated successfully');*/
        return null;
    }
}
