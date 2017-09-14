<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Buffet | Productos</title>

   <link rel="icon" href="{{asset('images/logo.jpg')}}" type="image/jpg">
<meta name="viewport" content="width=device-width,initial-scale=1.0">

<link rel="stylesheet" href="{{asset('css\styleEscritorio.css')}}" >
<link rel="stylesheet" href="{{asset('css\styleResponsive.css')}}"  >

<script type="text/javascript" src="{{asset('js/productos.js')}}"></script>
</head>

<body>
@include('header')
@include('navGeneral')
<div class="container">
<hr>
<h2 class="text-center">El menu del dia es</h2>
<hr>

  <div class="row text-center">
    





        


<div class="divMenu">


<form method="post" action="enviarMenu.php">

 @forelse($menu as $item) 

 <h2>

{{$item->cant}}  {{$item->producto->nombre}}<br/>
</h2>
 @empty
<h2>Hoy no hay menú</h2> 
  @endforelse




</div>
    <input type="submit" disabled="true" value="enviar a suscripos">
 </form> 
@if ($exito == true)
<h2>se envio correctamente a los suscriptos</h2> 
@endif
  
  </div>
  </div>
@include('footer')

</body>

</html>






