<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Buffet | Detalle de compra</title>

 <link rel="icon" href="{{asset('images/logo.jpg')}}" type="image/jpg">
<meta name="viewport" content="width=device-width,initial-scale=1.0">

<link rel="stylesheet" href="{{asset('css\styleEscritorio.css')}}" >
<link rel="stylesheet" href="{{asset('css\styleResponsive.css')}}"  >

<script type="text/javascript" src="{{asset('./js/productos.js')}}"></script>
</head>

<body>

@include('header')
@include('navGeneral')

<hr>

<h2 class="text-center">Detalle de Venta</h2>
<div>

<b>Tipo de Venta: </b>{{ $ingreso->nombre }} <br/>
<b>Descripcion de venta: </b>{{ $venta->descripcion }} <br/>



</div>
<hr>
<div class="container">
  <div class="row text-center">
    
    <table class="tablaProductos">
        <thead>
        <tr style="background:#DDF;">
            <th>Producto</th>
            <th>Cantidad</th>
            <th>Precio Unitario</th>  
            <th>Fecha de Venta</th>        
        </tr>
        </thead>
        <tbody>

   @foreach($ingresosParaVenta as $ingreso)
    <tr style="background:#EEEEEE">
        <td>  {{ $ingreso->nombre }} </td>
        <td>  {{ $ingreso->cantidad }} </td>
        <td>  {{ $ingreso->precio_unitario }} </td>
         <td>  {{ Carbon\Carbon::parse($venta->fecha)->format('d-m-Y') }} </td>

    </tr>

    @endforeach
    </tbody>
</table>






 
  
  </div>
  </div>
@include('footer') 

</body>


</html>





