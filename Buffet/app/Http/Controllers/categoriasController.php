<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Categoria;

class categoriasController extends Controller
{
    public function getSubcategorias($idCategoriaPadre){
    	$html="<option selected>Seleccione subcategoría</option>";
    	$categorias=Categoria::where('categoria_padre', $idCategoriaPadre)->get();
    	foreach ($categorias as $categoria) {
        	$html.="<option value='".$categoria->id."'>".$categoria->nombre."</option>";
    	}
    	return $html;
    }
}
