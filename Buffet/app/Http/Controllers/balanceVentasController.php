<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Ingreso;
use DateTime;
use App\Http\Requests\dateRequest;
use Fpdf;

class balanceVentasController extends Controller{
     public function mostrar(){
         return view('fechasBalanceVentasVista');
     }
     
     public function mostrarGrafico(dateRequest $request){
                $inicial=new DateTime(str_replace('/', '-',  $request->input('fechaInicial')));
                $inicial= $inicial->format('Y-m-d');
                $final=new DateTime(str_replace('/', '-', $request->input('fechaFinal')));
                $final= $final->format('Y-m-d');
                $productos= Ingreso::getCantVentas($inicial,$final);
                return view('balanceVentasVista', ["productos" => $productos]);
     }
             
     public function crearPDF(dateRequest $request){    
                $inicial=new DateTime(str_replace('/', '-',  $request->input('fechaInicial')));
                $inicial= $inicial->format('Y-m-d');
                $final=new DateTime(str_replace('/', '-', $request->input('fechaFinal')));
                $final= $final->format('Y-m-d');
                $ventas= Ingreso::getCantVentas($inicial,$final);
				Fpdf::AliasNbPages();
				Fpdf::AddPage();
				Fpdf::SetFont('Times','',12);
				Fpdf::Cell(30,10,'Ventas',1,0,'C');
				Fpdf::Ln(20);
				foreach ($ventas as $producto)
				{
				    Fpdf::Cell(0,10,$producto->nombre.' se vendieron '.$producto->cantidad.' unidades',0,1);
				}
				Fpdf::Output();
                exit;
     }

     public function mostrarPDF(){
         return view('fechasBalanceVentasPdf');
     }
}