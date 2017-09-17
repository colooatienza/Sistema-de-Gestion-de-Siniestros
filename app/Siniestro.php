<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Http\Request;

class Siniestro extends Authenticatable
{
    protected $table = 'siniestro';

    protected $fillable = [  'poliza', 'fecha', 'estado', 'descripcion' ];

    public $timestamps = false;

    protected $dates = ['fecha'];

    public function polizaObject(){
        return $this->belongsTo('App\Poliza', 'id');
    }

     static public function siniestros(){
         return Siniestro::get();
     }

    static public function registrar(Request $request){

        $siniestro = new Siniestro(); 
        $siniestro->descripcion = $request->input('descripcion');
        $siniestro->fecha = $request->input('fecha');
        $siniestro->estado = "En tramite";
        $siniestro->poliza = $request->input('id');
        $siniestro->save();
    
     }
}


