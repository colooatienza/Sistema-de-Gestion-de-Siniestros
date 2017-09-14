<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\SoftDeletes;

class Compra extends Model{
    use SoftDeletes;
    protected $table='compra';
    protected $fillable=['proveedor', 'proveedor_cuit', 'fecha', 'egreso_tipo', 'borrado'];
    public $timestamps = false;
    
    protected $dates = ['deleted_at'];

    public function egreso_tipo(){
    	return $this->belongsTo('app\Egreso_Tipo.php');
    }

    public function egresos(){
    	return $this->hasMany('app\Egreso.php');    	
    }

    static public function gastosOrdenadosporFecha($porPagina){
      $sql = Compra::join('egreso', 'compra.id', '=', 'egreso.compra_id')
            ->select('compra.*',DB::raw('SUM(egreso.precio_unitario*egreso.cantidad) AS monto'))
            ->groupBy('compra.id')
            ->orderBy('fecha')
            ->paginate($porPagina['valor']);
     return $sql;
     }
}
