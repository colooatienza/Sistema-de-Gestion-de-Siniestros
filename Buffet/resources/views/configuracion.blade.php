<!DOCTYPE html>
<html>
<head>



<meta name="viewport" content="width=device-width,initial-scale=1.0">

<meta charset="UTF-8">
<link rel="stylesheet" href="{{asset('css\styleEscritorio.css')}}" >

<link rel="stylesheet" href="{{asset('css\configuracion.css')}}" >
<link rel="icon" href="Images/logo.jpg" type="image/jpg">
<script src="js/jquery-1.11.3.min.js"></script> 
<script type="text/javascript" src="js/configuracion.js"></script>

<title>Buffet | Configuración</title>

</head>
<body>

@include('header')
@include('navGeneral')


<h2> Configuración del Sitio</h2>


<div class=formularioConfiguracion>
    {!! Form::open() !!}
  <p>Título:
  <input type="text" name="titulo" class="imputForm" value="{{ $datos['titulo'] }}" required></p>
  <p>Descripción:</p>
  <textarea name="descripcion" required class="descripcion" rows="6"> {{ $datos['descripcion'] }} </textarea>
  <p>E-Mail:</p>
  <input type="email" name="mail" class="imputForm" value="{{ $datos['mail'] }}" >
  <p>Elementos por página en los listados:</p>
  <input type="number" min="1" name="elementos" value="{{ $datos['elementos'] }}" class="imputForm" >

  <input type="checkbox" name="habilitar" id="habilitar" value=0 class="imputForm" 
  @if($datos['habilitar']=='on') 
      checked 
  @endif 
  onchange="mostrarMensaje()"> Deshabilitar Sitio <br/>
  
  <input type="text" name="mensaje" id="mensaje" class="imputForm" value="{{ $datos['mensaje'] }}" 
  @if ($datos['habilitar']!='on')    disabled @endif >
   
  <br><br>
  <input type="submit" value="Guardar Cambios">
    {!! Form::close() !!}
 </div>
<br/>

@if($guardado)
    <p>Se ha guardado correctamente la configuración!</p>
@endif

</body>

</html>



