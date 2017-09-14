<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Buffet | Usuarios</title>

  <link rel="icon" href="./images/logo.jpg" type="image/jpg">
<meta name="viewport" content="width=device-width,initial-scale=1.0">


<link rel="stylesheet" href="{{asset('css\styleEscritorio.css')}}" >
<link rel="stylesheet" href="{{asset('css\styleResponsive.css')}}"  >

<script type="text/javascript" src="./js/usuarios.js"></script>
<script type="text/javascript" src="./js/jquery.min.js"></script>

</head>

<body>
@include('header')
@include('navGeneral')

<hr>
<h2 class="text-center">Listado de Usuarios</h2>
<hr>
<div class="container">
  <div class="row text-center">
    
  @if($agregado)
      <p>Se ha agregado correctamente la venta!</p>
  @endif
    <table class="tablaProductos">
        <thead>
        <tr class="encabezadoTabla">
            <th>Usuario</th>
            <th>Email</th>
            <th>Roll</th>
            <th colspan="3">Operaciones</th>
        </tr>
        </thead>
        <tbody>




        


  @foreach($usuarios as $item)
    <tr class="filaTabla">
    <td>  {{ $item->usuario }} </td>
    <td>  {{ $item->email }} </td>
    <td class="separados"> {{ $item->rol->nombre}} </td>

    <td class="separados">
      <a href="editarUsuario/{{$item->id}}" role="button">
        <img src="{{asset('./images/editar.png')}}" alt="Editar usuario"  width="15" height="15" > <p class="textoOperaciones">Modificar</p>
      </a>
    </td>

    <td class="separados">
       <a href="borrarUsuario/{{ $item->id }}">

       <img src="{{asset('./images/eliminar.png')}}" alt="Detalle del usuario" width="15" height="15"> <p class="textoOperaciones">Eliminar</p>
      </a>
       </td>

       <td class="separados">
      @if($item->habilitado == 1)
          <a href="inhabilitarUsuario/{{$item->id}}" role="button"> <p class="textoOperaciones"> Deshabilitar </p>  </a> 
      @else
          <a href="habilitarUsuario/{{$item->id}}" role="button"> <p class="textoOperaciones"> Habilitar </p>  </a>   
      @endif 
    </td>

    
  @endforeach
            





</tbody>
    </table>


{{ $usuarios->links()}}

 
  
  </div>
  </div>
 @include('footer')
</body>

</html>






