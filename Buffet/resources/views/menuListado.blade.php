<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Buffet | Productos</title>

 @include('headerCompleto')
<div class="container">
<hr>
<h2 class="text-center">Listado de menu</h2>
<hr>

  <div class="row text-center">
    
@if($agregado == true)
    <p>Se ha agregado correctamente el producto!</p>
@endif
    <table class="tablaProductos">
        <thead>
        <tr class="encabezadoTabla">
            <th>Nombre</th>
            <th>Marca</th>
            <th>Stock Actual</th>
            <th>Fecha en que estara disponible</th>
            <th>cantidad</th>
            <th colspan="2">Operaciones</th>
        </tr>
        </thead>
        <tbody>




        


  @foreach($menus as $menu)
    <tr class="filaTabla">

  
            
           
    <td>  {{ $menu->producto->nombre }} </td>
    

    <td class="separados"> {{ $menu->producto->marca}} </td>
    <td class="separados"> {{ $menu->producto->stock}}</td>
    
    <td class="separados"> {{ Carbon\Carbon::parse($menu->fecha)->format('m-d-Y') }}</td>

        <td class="separados"> {{ $menu->cant}}</td>

  

    <td class="separados">
    
   
      <a href="{{url('/editarMenu', $menu->id) }}">
        <img src="./images/editar.png" alt="Editar producto"  width="15" height="15" > <p class="textoOperaciones">Modificar</p>
      </a>
    </td>

    <td class="separados">
       <a href="borrarMenu.php?id={{ $menu->id }}">

       <img src="./images/eliminar.png" alt="Detalle del producto" width="15" height="15"> <p class="textoOperaciones">Eliminar</p>
      </a>
       </td>

  
  @endforeach
            




</tbody>
</table>
{{ $menus->links()}}
  
  </div>
  </div>
@include('footer')

</body>

</html>