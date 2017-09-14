<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Buffet | Detalle de producto</title>

  <link rel="icon" href="./images/logo.jpg" type="image/jpg">
<meta name="viewport" content="width=device-width,initial-scale=1.0">


<link rel="stylesheet" href="{{asset('css\styleEscritorio.css')}}" >
<link rel="stylesheet" href="{{asset('css\styleResponsive.css')}}"  >
<script type="text/javascript" src="./js/productos.js"></script>
</head>

<body>



@include('header')
@include('navGeneral')










<hr>

<h2 class="text-center">Detalle de Producto</h2>

<hr>
<div class="container">
  <div class="row text-center">
    
    <table class="tablaProductos">
        <thead>
        <tr style="background:#DDF;">
            <th>Producto</th>
            <th>Marca</th>
            <th>Stock Actual</th>
            <th>Stock minimo</th>
            <th>Proveedor</th>
            <th>Precio</th>
            <th>Categoría</th>
            <th>Descripcion</th>
            <th>Fecha alta</th>
           
            
        </tr>
        </thead>
        <tbody>

    <tr style="background:#EEEEEE">

   
    <td>  {{ $producto->nombre }} </td>
    <td class="separados"> {{ $producto->marca}} </td>
    <td class="separados"> {{ $producto->stock}}</td>
    <td class="separados"> {{ $producto->stock_minimo}}</td>
    <td class="separados"> {{ $producto->proveedor}}</td>
    <td class="separados"> $ {{ $producto->precio}}</td>
    <td class="separados"> {{ $categoria->nombre}}</td>
    <td class="separados"> {{ $producto->descripcion}}</td>

    <td class="separados">{{ Carbon\Carbon::parse($producto->fecha_alta)->format('d-m-Y') }}</td>

     
    </tbody>

</table>






 
  
  </div>
  </div>
@include('footer')

</body>


</html>





