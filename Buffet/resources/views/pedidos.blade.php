<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Buffet | Pedidos</title>

  <link rel="icon" href="./images/logo.jpg" type="image/jpg">
<meta name="viewport" content="width=device-width,initial-scale=1.0">


<link rel="stylesheet" href="{{asset('css\styleEscritorio.css')}}">
<link rel="stylesheet" href="{{asset('css\styleResponsive.css')}}">

<script type="text/javascript" src="./js/jquery.min.js"></script>

</head>

<body>
@include('header')
@include('navGeneral')

<hr>
<h2 class="text-center">Listado de Pedidos</h2>
<hr>
<div class="container">
  <div class="row text-center">
    
    <table class="tablaProductos">
        <thead>
        <tr class="encabezadoTabla">
            <th>Fecha</th>
            <th>Usuario</th>
            <th>Ubicacion</th>
            <th>Estado</th>
            <th colspan="3">Operaciones</th>
        </tr>
        </thead>
        <tbody>




        


  @foreach($pedidos as $item)
    <tr class="filaTabla">
    <td>  {{ $item->fecha }} </td>
    <td>  {{ $item->usuario->nombre}} {{$item->usuario->apellido }} </td>
    <td> {{ $item->usuario->ubicacion->nombre}} </td>
    <td> {{ $item->estado}} </td>




      @if($item->estado == "Pendiente")
    <td class="separados">
      <a href="detallePedido.php?id={{ $item->id }}">
       <img src="./images/detalles.png" alt="Detalle del pedido" width="15" height="15"> <p class="textoOperaciones">Ver Detalles</p>
      </a>
    </td>
          <td class="separados">
          <a href="aceptarPedido.php?id={{$item->id }}" role="button"> <p class="textoOperaciones"> Aceptar </p>  </a> 
          </td>

          <td class="separados">
          <a href="rechazarPedido.php?id={{ $item->id }}" role="button"> <p class="textoOperaciones"> Cancelar </p>  </a> 
          </td>

      @else

    <td colspan="3" class="separados">
      <a href="detallePedido.php?id={{ $item->id }}">
       <img src="./images/detalles.png" alt="Detalle del pedido" width="15" height="15"> <p class="textoOperaciones">Ver Detalles</p>
      </a>
    </td>

      @endif 

    
  @endforeach
            





</tbody>
    </table>



{{ $pedidos->links()}}

 
  
  </div>
  </div>
 @include('footer')
</body>

</html>






