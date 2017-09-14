<!DOCTYPE html>
<html lang="es">
<head>
	<link rel="icon" href="{{asset('images/logo.jpg')}}" type="image/jpg">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<meta charset="UTF-8">
	<link rel="stylesheet" href="{{asset('css\styleEscritorio.css')}}" >
	<title>Buffet - Facultad de Informática</title>
</head>
<body>
	

@include('header')
@include('navGeneral')


<div class="page-wrap">
  

 <h3> {{$mensaje->valor}} </h3>
<h3>Menú del día</h3> <br/>

<div class="divMenu">




@forelse($menu as $item) 

 <h2>

{{$item->cant}}  {{$item->producto->nombre}}<br/>
</h2>
 @empty
<h2>Hoy no hay menú</h2> 
  @endforelse
</div>
  </div>



 
@include('footer')
</body>

</html>
