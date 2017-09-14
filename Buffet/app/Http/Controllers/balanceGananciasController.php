<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Ingreso;
use DateTime;
use App\Http\Requests\dateRequest;
use Fpdf;

class balanceGananciasController extends Controller{
     public function mostrar(){
         return view('fechasBalanceGananciasVista');
     }
     
     public function mostrarGrafico(dateRequest $request){
                $inicial=new DateTime(str_replace('/', '-',  $request->input('fechaInicial')));
                $inicial= $inicial->format('Y-m-d');
                $final=new DateTime(str_replace('/', '-', $request->input('fechaFinal')));
                $final= $final->format('Y-m-d');
                $ganancias=Ingreso::getGanancias($inicial,$final);
                return view('balanceGananciasVista', ["ganancias" => $ganancias]);
     }

     public function crearPDF(dateRequest $request){    
                $inicial=new DateTime(str_replace('/', '-',  $request->input('fechaInicial')));
                $inicial= $inicial->format('Y-m-d');
                $final=new DateTime(str_replace('/', '-', $request->input('fechaFinal')));
                $final= $final->format('Y-m-d');
                $ganancias= Ingreso::getGanancias($inicial,$final);
				Fpdf::AliasNbPages();
				Fpdf::AddPage();
				Fpdf::SetFont('Times','',12);
				Fpdf::Cell(30,10,'Ganancias',1,0,'C');
				Fpdf::Ln(20);
				foreach ($ganancias as $item)
				{
                    $inicial=new DateTime(str_replace('/', '-', $item->fecha));
                    $inicial= $inicial->format('d-m-Y');
				    Fpdf::Cell(0,10,'El dia: '.$inicial.' hubo un saldo de: '.$item->cantidad,0,1);
				}
				Fpdf::Output();
                exit;
     }

     public function mostrarPDF(){
         return view('fechasBalanceGananciasPdf');
     }

}