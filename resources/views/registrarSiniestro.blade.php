<!DOCTYPE html>
<html>
<head>



  <link rel="icon" href="images/logo.jpg" type="image/jpg">
<meta name="viewport" content="width=device-width,initial-scale=1.0">

<meta charset="UTF-8">
<link rel="stylesheet" href="{{asset('css\styleEscritorio.css')}}" >

<link rel="icon" href="{{asset('images/logo.jpg')}}" type="image/jpg">
<script type="text/javascript" src="{{asset('js/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/registrarSiniestro.js')}}"></script>

<title>SGS | Registrar Siniestro</title>
</head>
<body>
<div class="page-wrap">

@include('header')
@include('nav')

<div class="divRegistrarSiniestro" id='divRegistrarSiniestro'> 
<h1> Registrar siniestro en la poliza nro {{ $poliza }}</h1>
<div class='formularioAgregar'  id='formularioAgregar'>
  {!! Form::open(['action' => 'siniestrosController@registrar', 'method' => 'POST']) !!}
  {!! Form::hidden('id', $poliza ); !!} 
    <input type= "hidden" name="cantProductos" id="cantProductos" class="imputForm" value="1">
  <p>Fecha de ocurrencia:</p>
    <input type= "date" name="fecha" id="fecha" class="imputForm" required>
  <p>Descripción:</p>
    <textarea rows="4" name="descripcion" class="imputForm" required> </textarea>
  <!--<p>Objetos a indemnizar:</p>
  <p>Objetos 1:</p>
    <input type= "text" name="objeto1" id="objeto1" placeholder="Nombre">
    <input type= "number" name="cantidad1" id="cantidad1" placeholder="Cant." class="cantidad">
    <input type= "text" name="descripcion1" id="descripcion1" placeholder="Descripción" class="descripcion">
    <img id="btnAgregar" src="{{asset('images/add.jpg')}}" class="btnAgregar">-->
  
  <br><br>
  <input type="submit" value="REGISTRAR">
  {!! Form::close() !!} 
 </div>
</div>
</div>

 

@include('footer')


</body>

</html>



