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
}
