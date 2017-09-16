<!DOCTYPE html>
<html>
<head>



<meta name="viewport" content="width=device-width,initial-scale=1.0">

<meta charset="UTF-8">
<link rel="stylesheet" href="{{asset('css\styleEscritorio.css')}}" >

<script type="text/javascript" src="{{asset('js\editarUsuario.js')}}"></script>
  <link rel="icon" href="images/logo.jpg" type="image/jpg">

<title>Buffet | Editar usuario</title>
</head>
<body>


@include('header')
@include('navGeneral')

<div class="divForm"> 
<h1> Modificar Usuario</h1>
<div class=formularioAgregar>
 {!! Form::open(['action' => 'editarUsuario@editar', 'method' => 'POST']) !!}
   
  <p>Nombre de Usuario:</p>
   {!! Form::hidden('id', $usuario->id ); !!}
    <input type= "text" name="usuario" value="{{ $usuario->usuario }}" class="imputForm" required>
    @if($nodisponible)
      <br> El nombre de usuario no esta disponible, elija otro 
    @endif
  <p>Nombre:</p>
    <input type= "text" name="nombre" value="{{ $usuario->nombre }}"  class="imputForm" required>
  <p>Apellido:</p>
    <input type= "text" name="apellido" value="{{ $usuario->apellido }}"  class="imputForm" required>
  <p>DNI:</p>
    <input type="number" name="dni" value="{{ $usuario->dni }}"  class="imputForm">
  <p>Correo Electrónico:</p>
    <input type="email" name="email" value="{{ $usuario->email }}"  placeholder="ejemplo@hotmail.com" class="imputForm" required>
  <p>Teléfono:</p>
    <input type="text" name="telefono" value="{{ $usuario->telefono }}"  class="imputForm">
  <p>Roll de Usuario:</p>
    <select name="rol" id="selectRol" class="imputForm" onchange="validarUbicacion()">
      <option selected value="{{ $usuario->rol_id }}" > {{ $usuario->rol->nombre }}</option>
      <option value="1">Administración</option>
      <option value="2">Gestión</option>
      <option value="3">Usuario</option>
    </select>
      
      <div id="divUbicacion" 
      @if($usuario->rol_id !=3) 
        style="display: none" 
      @endif 
      >
  <p>Ubicación:</p>
   <select name="ubicacion" id="selectUbicacion" class="imputForm"  >
   
  <option value="NULL">Sin ubicación</option>
  @if($usuario->ubicacion_id >= 1) 
    <option selected value="{{$usuario->ubicacion_id}}">{{$usuario->ubicacion->nombre}}</option>
  @endif 
  @foreach($ubicaciones as $item)
      <option value="{{ $item->id }}" > {{ $item->nombre }}</option>
  @endforeach
    </select>
    </div>
  @if($exito) 
  <br>Los cambios han sido guardado exitosamente
  @endif 
  <br><br>
  <input type="submit" value="Guardar Cambios">
  <input type="submit" value="Cambiar Contraseña">
  {!! Form::close() !!}
 </div>
</div>

 

@include('footer')


</body>

</html>



