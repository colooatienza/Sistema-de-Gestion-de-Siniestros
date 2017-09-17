<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>SGS | Mis Polizas</title>

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
<h2 class="text-center">Polizas Vigentes</h2>
<hr>

  <div class="row text-center">
    <table class="tablaProductos">
        <thead>
        <tr class="encabezadoTabla">
            <th>Numero</th>
            <th>Fecha de Inicio</th>
            <th>Cobertura</th>
            <th>Precio</th>
            <th>Denunciar Siniestro</th>
        </tr>
        </thead>
        <tbody>


  @foreach($polizas as $item) 
    <tr class="filaTabla">
    <td>  {{ $item->id }} </td>
    <td class="separados"> {{ date('d/m/Y', strtotime($item->fechainicio))}} </td>
    <td class="separados"> {{ $item->coberturaObject->descripcion}}</td>
    <td class="separados"> $ {{ $item->precio}}</td>

    <td class="separados">

       <a href="{{url ('/registrarSiniestro',$item->id )}}">

       <img src="{{asset('./images/detalles.png')}}" alt="Detalle del producto" width="15" height="15"> <p class="textoOperaciones">Siniestro</p>
      </a>
    </td>
    </tr>
    
  @endforeach
            





</tbody>
</table>
  
  
  
  </div>
  </div>
@include('footer')

</body>

</html>






