<!DOCTYPE html>
<html>
<head>



  <link rel="icon" href="images/logo.jpg" type="image/jpg">
<meta name="viewport" content="width=device-width,initial-scale=1.0">

<meta charset="UTF-8">
<link rel="stylesheet" href="{{asset('css\styleEscritorio.css')}}" >

<link rel="icon" href="{{asset('images/logo.jpg')}}" type="image/jpg">
<script type="text/javascript" src="{{asset('js/jquery.min.js')}}"></script>

<title>Buffet</title>
</head>
<body>
<div class="page-wrap">

@include('header')
@include('navGeneral')

<div class="divForm"> 
<h1> Registrar siniestro en la poliza nro {{ $poliza }}</h1>
<div class=formularioAgregar>
  {!! Form::open(['action' => 'siniestrosController@registrar', 'method' => 'POST']) !!}
  {!! Form::hidden('id', $poliza ); !!} 
  <p>Fecha de ocurrencia:</p>
    <input type= "date" name="fecha" id="fecha" class="imputForm" required>
  <p>Descripción:</p>
    <textarea rows="4" name="descripcion" class="imputForm" required> </textarea>
  <p>Fotos:</p>
    <input type="file" name="fotos" accept="image/x-png,image/gif,image/jpeg" multiple /> 
  <br><br>
  <input type="submit" value="REGISTRAR">
  {!! Form::close() !!} 
 </div>
</div>
</div>

 

@include('footer')


</body>

</html>



