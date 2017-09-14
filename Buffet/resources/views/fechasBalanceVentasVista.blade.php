<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width,initial-scale=1.0">

	<meta charset="UTF-8">
	<title>Buffet | Agregar Venta</title>
	<link rel="stylesheet" href="{{asset('css\styleEscritorio.css')}}" >

	<link rel="icon" href="{{asset('images/logo.jpg')}}" type="image/jpg">
	<script type="text/javascript" src="{{asset('js/jquery.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/agregarVenta.js')}}"></script>
	<link rel="stylesheet" href="{{asset('css/venta.css')}}">

	<link href="{{asset('calendario_dw/calendario_dw-estilos.css')}}" type="text/css" rel="STYLESHEET">
	 
	<script type="text/javascript" src="{{asset('calendario_dw/jquery-1.4.4.min.js')}}"></script>
</head>
<body>

	@include('header')
	@include('navGeneral')
	<div class="container">
	
	<h2> Generar Balance de Ventas</h2>
	 <div class="row text-center">
	<br><br>
	<form method="POST" action="{{url('/balanceVentas')}}">
		 {{ csrf_field() }}
		<p>Fecha Inicial</p>
		<input type="text" id="fecha" name="fechaInicial" class="campofecha" size="12" required>
		<br><br>
		<p>Fecha Final</p>
		<input type="text" id="fecha2" name="fechaFinal" class="campofecha" size="12" required>
		<br><br>
	<input type="submit" value="Ver Gráfica">
	</form>
		@if(count($errors) > 0)
		@foreach($errors->all() as $error)
			{{$error}}
		@endforeach
		@endif
	 </div>
  </div>
@include('footer')

	<script type="text/javascript">
	  	$(document).ready(function(){
	    $(".campofecha").calendarioDW();})
  	</script>
   <script type="text/javascript" src="{{asset('calendario_dw/calendario_dw.js')}}"></script>

</body>
</html>