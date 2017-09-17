<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Poliza;

class polizasController extends Controller 
{
     public function mostrarListado(){

        return view('polizas', ["polizas" => Poliza::polizas()]);
    }
}
