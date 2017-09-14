<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Buffet | Detalle de producto</title>

   @include('headerCompleto')




<link href="{{asset('calendario_dw/calendario_dw-estilos.css')}}" type="text/css" rel="STYLESHEET">




<hr>
<br>
<h2 class="text-center">Usted esta seleccionando este producto como menu de un día</h2>
<h2 class="text-center">Por favor seleccione una fecha y una cantidad</h2>
<hr>
<div class="container">
  <div class="row text-center">

 {!! Form::open(['action' => 'menuListadoController@editando', 'method' => 'POST']) !!}
  <form method="POST" onSubmit="return validar()" action="../editandoMenu" class="agregarpro"  enctype="multipart/form-data" >
  {!! Form::hidden('id', $menu->id ); !!}
    {!! Form::hidden('producto', $menu->producto->id ); !!}
  
  <p>Fecha:</p>
  <input type="text" name="fecha" class="campofecha" size="12" value="{{ Carbon\Carbon::parse($menu->fecha)->format('m-d-Y') }}" required> <br/><br/>
    
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
    <td>  {{ $menu->producto->nombre }} </td>
    <td class="separados"> {{ $menu->producto->marca}} </td>
    <td class="separados"> {{ $menu->producto->stock}}</td>
    <td class="separados"> {{ $menu->producto->stock_minimo}}</td>
      <td class="separados"> <input type="number" min="1" max="{{ $menu->producto->stock}}" name="cant" value="{{ $menu->cant }}"></td>
    
 </tr>
 </tbody>
 </table>
  <input type="submit" value="editar">
 </form> 

    </tbody>
</table>

@if($exito)
<p> se realizo la edicion del menu con exito <p>

@endif 




 
  
  </div>
  </div>
@include ('footer')
<script type="text/javascript">
  $(document).ready(function(){
    $(".campofecha").calendarioDW();
  })
  </script>
   <script type="text/javascript" src="{{asset('calendario_dw/calendario_dw.js')}}"></script>

</body>


</html>





