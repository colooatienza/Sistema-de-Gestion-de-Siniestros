<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Buffet | Detalle de compra</title>

<link rel="icon" href="{{asset('images/logo.jpg')}}" type="image/jpg">
<meta name="viewport" content="width=device-width,initial-scale=1.0">

<link rel="stylesheet" href="{{asset('css\styleEscritorio.css')}}" >


<script type="text/javascript" src="{{asset('js/productos.js')}}"></script>
</head>

<body>

 @include('header')
 @include('navGeneral')

<div class="page-wrap">
<hr>

<h2 class="text-center">Detalle de Compra</h2>
<div>
<b>Fecha de la Compra: </b>{{ Carbon\Carbon::parse($compra->fecha)->format('d-m-Y') }} <br/>
<b>Proveedor: </b>{{ $compra->proveedor}} <br/>
<b>CUIT: </b>{{ $compra->proveedor_cuit}} <br/>
<b>Tipo: </b>{{ $compra->tipo}} <br/>




<hr>
<div class="container">
  <div class="row text-center">
    
    <table class="tablaProductos">
        <thead>
        <tr style="background:#DDF;">
            <th>Producto</th>
            <th>Cantidad</th>
            <th>Precio Unitario</th>         
        </tr>
        </thead>
        <tbody>

    @foreach($egresos as $item)
    <tr style="background:#EEEEEE">
        <td>  {{ $item->producto->nombre }} </td>
        <td> {{ $item->cantidad}}</td>
        <td> $ {{ number_format($item->precio_unitario, 2, ',', '.') }}</td>
    </tr>
    @endforeach
    </tbody>
</table>


 <img src="../../uploads/{{$compra->id}}" style="width:50%"/><br/>



 
  
  </div>
  </div>
@include('footer')

</body>


</html>





