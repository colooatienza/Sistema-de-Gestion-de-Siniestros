<!DOCTYPE html>
<html>
<head>



<meta name="viewport" content="width=device-width,initial-scale=1.0">

<meta charset="UTF-8">
<link rel="stylesheet" href="{{asset('css\styleEscritorio.css')}}" >

<script src="{{asset('js/jquery.min.js')}}"></script> 
<link rel="icon" href="{{asset('images/logo.jpg')}}" type="image/jpg">
<script src="{{asset('js/loguearUsuario.js')}}"></script>
<title>Buffet | Login</title>
</head>
<body>
<div class="page-wrap">

@include('header')
@include('navGeneral')

<div class="divLoginContenido"> 
<p>
       Ingresa Usuario y Contraseña</p>

  <div class="divLogin">
    <form method="POST" action="{{url('/login')}}" class="agregarusuar">
         {{ csrf_field() }}
      <input type= "text" id="usuario" placeholder="Usuario" name="usuario" class="txtLogin" required autofocus>  <br>
      <input type= "password" id="password" placeholder="Clave" name="password" class="txtLogin" required> <br>
      <input type= "submit" value= "Entrar" class="btnLogin"> 
    </form> 
 </div>
 
  
@if(session()->has('msj'))
<p>{{session('msj')}}</p>

@endif
   
@if(count($errors) > 0)
  @foreach($errors->all() as $error)
         {{$error}}
  @endforeach
@endif

</div>
</div>

 

@include('footer')


</body>
 
</html>



