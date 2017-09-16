<!DOCTYPE html>
<html>
<head>



  <link rel="icon" href="images/logo.jpg" type="image/jpg">
<meta name="viewport" content="width=device-width,initial-scale=1.0">

<meta charset="UTF-8">
<link rel="stylesheet" href="{{asset('css\styleEscritorio.css')}}" >

<link rel="icon" href="{{asset('images/logo.jpg')}}" type="image/jpg">
<script type="text/javascript" src="{{asset('js/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/agregarUsuario.js')}}"></script>

<title>Buffet</title>
</head>
<body>
<div class="page-wrap">

@include('header')
@include('navGeneral')

<div class="divForm"> 
<h1> Registrar un Usuario Online</h1>
<div class=formularioAgregar>
 {!! Form::open(['action' => 'usuariosController@registrar', 'method' => 'POST']) !!}
  <p>Nombre de Usuario:</p>
    <input type= "text" name="usuario" id="txtUsuario" class="imputForm" required>
    <span id="error"></span>
  <p>Clave de Usuario:</p>
    <input type= "password" name="clave" class="imputForm" required>
  <p>Nombre:</p>
    <input type= "text" name="nombre" class="imputForm" required>
  <p>Apellido:</p>
    <input type= "text" name="apellido" class="imputForm" required>
  <p>DNI:</p>
    <input type="number" name="dni" class="imputForm" required>
  <p>Correo Electrónico:</p>
    <input type="email" name="email" placeholder="ejemplo@hotmail.com" class="imputForm" required>
  <p>Teléfono:</p>
    <input type="text" name="telefono" class="imputForm" required>
    <input type="hidden" name="codigo" value="3" >
  <p>Ubicación:</p>
      <select name="ubicacion" id="selectUbicacion" class="imputForm"  >
   
  <option value="NULL">Sin ubicación</option>
  @foreach($ubicaciones as $item)
      <option value="{{ $item->id }}" > {{ $item->nombre }}</option>
  @endforeach
    </select>
  <br><br>
  <input type="submit" value="REGISTRAR">
  {!! Form::close() !!}
 </div>
</div>
</div>

 

@include('footer')


</body>

</html>



