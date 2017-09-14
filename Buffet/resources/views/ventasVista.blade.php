<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Buffet | Ventas</title>

  <link rel="icon" href="{{asset('images/logo.jpg')}}" type="image/jpg">
<meta name="viewport" content="width=device-width,initial-scale=1.0">


<link rel="stylesheet" href="{{asset('css\styleEscritorio.css')}}" >
<link rel="stylesheet" href="{{asset('css\styleResponsive.css')}}"  >

</head>

<body>
@include('header')
@include('navGeneral')

<hr>
<h2 class="text-center">Listado de Ventas</h2>
<hr>
<div class="container">
  <div class="row text-center">
    
  @if($agregado)
      <p>Se ha agregado correctamente la venta!</p>
  @endif
    <table class="tablaProductos">
        <thead>
        <tr class="encabezadoTabla">
            <th>Fecha</th>
            <th>Monto</th>
            <th colspan="3">Operaciones</th>
        </tr>
        </thead>
        <tbody>




        


  @foreach($ventas as $item)
    <tr class="filaTabla">
    <td>  {{ Carbon\Carbon::parse($item->fecha)->format('d-m-Y') }} </td>
    <td class="separados"> $ {{ number_format($item->monto, 2, ',', '.') }}</td>

    <td class="separados">

      

      <a href=" {{url('/detalleVenta', $item->id) }}">

       <img src="{{asset('images/detalles.png')}}" alt="Detalle de la venta" width="15" height="15"> <p class="textoOperaciones">Ver Detalles</p>
      </a>
    </td>

    <td class="separados">
      <a href="editarVenta.php?id={{ $item->id }}" role="button">
        <img src="{{asset('images/editar.png')}}" alt="Editar venta"  width="15" height="15" > <p class="textoOperaciones">Modificar</p>
      </a>
    </td>

     <td class="separados">
       <a href="borrarVenta.php?id={{ $item->id }}">

       <img src="{{asset('images/eliminar.png')}}" alt="Detalle de la venta" width="15" height="15"> <p class="textoOperaciones">Eliminar</p>
      </a>
       </td>

    
   @endforeach
            





</tbody>
</table>
   {{ $ventas->links()}}

  </div>
  </div>
@include('footer')
</body>

</html>






