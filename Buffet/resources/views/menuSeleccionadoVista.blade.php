<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Buffet | Detalle de producto</title>

 <link rel="icon" href="{{asset('images/logo.jpg')}}" type="image/jpg">
<meta name="viewport" content="width=device-width,initial-scale=1.0">

<link rel="stylesheet" href="{{asset('css\styleEscritorio.css')}}" >
<script type="text/javascript" src="{{asset('./js/productos.js')}}"></script>
<link href="{{asset('calendario_dw/calendario_dw-estilos.css')}}" type="text/css" rel="STYLESHEET">
	 
	<script type="text/javascript" src="{{asset('calendario_dw/jquery-1.4.4.min.js')}}"></script>


</head>

<body>




@include('header')
@include('navGeneral')










<hr>
<br>
<h2 class="text-center">Usted esta seleccionando este producto como menu de un día</h2>
<h2 class="text-center">Por favor seleccione una fecha y una cantidad</h2>
<hr>
<div class="container">
  <div class="row text-center">
  <form method="POST" action="{{url('/menu', $producto->id)}}" class="agregarpro"  enctype="multipart/form-data" >
      {{ csrf_field() }}
  <p>Fecha:</p>
  <input type="text" name="fecha" class="campofecha" size="12" required> <br/><br/>
    
    <table class="tablaProductos">
        <thead>
        <tr style="background:#DDF;">
            <th>Producto</th>
            <th>Marca</th>
            <th>Stock Actual</th>
            <th>Stock minimo</th>
            <th>Cantidad</th>
            

            
        </tr>
        </thead>
        <tbody>

    <tr style="background:#EEEEEE">
    <td>  {{ $producto->nombre }} </td>
    <td class="separados"> {{ $producto->marca}} </td>
    <td class="separados"> {{ $producto->stock}}</td>
    <td class="separados"> {{ $producto->stock_minimo}}</td>
      <td class="separados"> <input type="number" min="1" max="{{ $producto->stock}}" name="cant" value="1"></td>
    
 </tr>
 </tbody>
 </table>
  <input type="submit" value="AGREGAR">
 </form> 

    </tbody>
</table>

  </div>
  </div>
@include('footer')
<script type="text/javascript">
  $(document).ready(function(){
    $(".campofecha").calendarioDW();
  })
  </script>
  <script type="text/javascript" src="{{asset('calendario_dw/calendario_dw.js')}}"></script>

</body>


</html>





