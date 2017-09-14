<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Buffet | Productos</title>

  <link rel="icon" href="{{asset('images/logo.jpg')}}" type="image/jpg">
<meta name="viewport" content="width=device-width,initial-scale=1.0">

<link rel="stylesheet" href="{{asset('css\styleEscritorio.css')}}" >
<link rel="stylesheet" href="{{asset('css\styleResponsive.css')}}"  >

<script type="text/javascript" src="{{asset('./js/productos.js')}}"></script>
</head>

<body>
@include('header')
@include('navGeneral')
<div class="container">
<hr>
<h2 class="text-center">Productos con Stock Mínimo</h2>
<hr>

  <div class="row text-center">
    <table class="tablaProductos">
        <thead>
        <tr class="encabezadoTabla">
            <th>Nombre</th>
            <th>Marca</th>
            <th>Stock</th>
            <th>Proveedor</th>
            <th colspan="3">Operaciones</th>
        </tr>
        </thead>
        <tbody>




        


  @foreach($productos as $item) 
    <tr class="filaTabla">
    <td>  {{ $item->nombre }} </td>
    <td class="separados"> {{ $item->marca}} </td>
    <td class="separados"> {{ $item->stock}} </td>
    <td class="separados"> {{ $item->proveedor}}</td>

    <td class="separados">
     <a href="{{url ('/detalleProducto',$item->id )}}">
    

       <img src="{{asset('./images/detalles.png')}}" alt="Detalle del producto" width="15" height="15"> <p class="textoOperaciones">Ver Detalles</p>
      </a>
    </td>

    <td class="separados">
      <a href="{{ url('/editarProducto',$item->id) }}" role="button">
        <img src="{{asset('./images/editar.png')}}" alt="Editar producto"  width="15" height="15" > <p class="textoOperaciones">Modificar</p>
      </a>
    </td>

    <td class="separados">
       <a href="{{url('borrarProducto', $item->id)}}">

       <img src="{{asset('./images/eliminar.png')}}" alt="Detalle del producto" width="15" height="15"> <p class="textoOperaciones">Eliminar</p>
      </a>
       </td>

    
  @endforeach
            





</tbody>
</table>
{{ $productos->links()}}
  
  </div>
  </div>
@include('footer')

</body>

</html>






