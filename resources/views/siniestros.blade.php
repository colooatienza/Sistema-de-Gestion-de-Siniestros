<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>SGS | Mis Siniestros</title>

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
<h2 class="text-center">Siniestros</h2>
<hr>

  <div class="row text-center">
    <table class="tablaProductos">
        <thead>
        <tr class="encabezadoTabla">
            <th>Numero</th>
            <th>Poliza</th>
            <th>Fecha</th>
            <th>Estado</th>
        </tr>
        </thead>
        <tbody>


  @foreach($siniestros as $item) 
    <tr class="filaTabla">
      <td>  {{ $item->id }} </td>
      <td class="separados"> {{ $item->poliza}}</td>
      <td class="separados"> {{ date('d/m/Y', strtotime($item->fecha))}} </td>
      <td class="separados"> {{ $item->estado}}</td>
    </tr>
    
  @endforeach
        
</tbody>
</table>
  
  
  
  </div>
  </div>
@include('footer')

</body>

</html>






