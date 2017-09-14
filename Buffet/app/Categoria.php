<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Producto;
use Illuminate\Http\Request;
use App\Http\Requests;


class Categoria extends Model
{
    protected $table="categoria";
    protected $fillable=["nombre", "categoria_padre"];
     public $timestamps = false;

    public function productos(){
    	return $this->hasMany('App\Producto');    	

    }
/*
    public function subcategorias(){
    	return $this->hasMany('App\Categoria', 'categoria_padre', 'id');
    }
*/
    public function get_categoria_padre(){
    	return $this->belongsTo('App\Categoria', 'categoria_padre', 'id');
    }


    static public function subCategoria($id){
       return Categoria::where('categoria_padre','=',$id)->get();
    }
}



