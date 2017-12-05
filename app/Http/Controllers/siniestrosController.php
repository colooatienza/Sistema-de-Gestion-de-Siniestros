<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Siniestro;

class siniestrosController extends Controller 
{
     public function mostrarListado(){
        return view('siniestros', ["siniestros" => Siniestro::siniestros()]);
    }

    public function registrarSiniestro($idPoliza){
        return view('registrarSiniestro', ["poliza" => $idPoliza]);
    }

    public function registrar(Request $request){
        Siniestro::registrar($request);
        return redirect('misSiniestros');
    }
}
