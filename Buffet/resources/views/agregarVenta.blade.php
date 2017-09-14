<!DOCTYPE html>
<html>
<head>



<meta name="viewport" content="width=device-width,initial-scale=1.0">

<meta charset="UTF-8">
<title>Buffet | Agregar Venta</title>
<link rel="stylesheet" href="{{asset('css\styleEscritorio.css')}}">
<link rel="stylesheet" href="{{asset('css\styleResponsive.css')}}">

  <link rel="icon" href="images/logo.jpg" type="image/jpg">
<script type="text/javascript" src="{{asset('js/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/agregarVenta.js')}}"></script>
<link rel="stylesheet" href="{{asset('css/venta.css')}}">

<link href="calendario_dw/calendario_dw-estilos.css" type="text/css" rel="STYLESHEET">
 
  <script type="text/javascript" src="calendario_dw/jquery-1.4.4.min.js"></script>
 
  
  



</head>

<body>

@include('header')
@include('navGeneral')
<h2> Agregar Nueva Venta</h2>
{!! Form::open(['action' => 'ventaController@agregando', 'method' => 'POST']) !!}
 <form method="POST" action="agregandoVenta.php" class="agregarpro">
<input type="text" id="fecha" name="fecha" class="campofecha" size="12" required>


 
  <input type="hidden" name="cantProductos" id="cantProductos" value="1">

   <p>Tipo:</p>
  <select name="tipo" id="tipo" required>  

  @foreach($tipos as $item) 
    
  <option value="{{ $item->id }}">{{ $item->nombre }}</option>
  @endforeach
  </select> 
   
  <p>Descripción:</p>
  <textarea name="descripcion" rows="10" cols="30"></textarea>  
  <br><br>

  <div id="divProductos">
<div id="formProducto" class="formularioProducto">
   

  <select class="categorias" subid="1" required>  
    <option >Seleccione Categoría</option>
 @foreach($categorias as $item) 
    <option value="{{ $item->id }}">{{ $item->nombre }}</option>
  @endforeach
  </select> 

    <select id="subcategoria1" class="subcategorias"  idselect="1" required>  
    <option >Seleccione subcategoría</option>
  </select> 
    <select name="producto1" id="productos1" idselect="1" class="productos" required>  
    <option value="">Seleccione producto</option>
  </select> 

  <p>Precio unitario:
  <input type= "number" min="0.00" value="0.00" step="0.01" id="precio1" name="precio1" class="imputForm"></p>
  <p>Cantidad:
  <input type="number" min="1" value="1" name="cantidad1" class="imputForm"></p>
  
 
 </div>
 </div>
  <button type="button" id="btnNuevo" >Nuevo Producto</button> <br/><br/>
  <input type="submit" value="AGREGAR">
  <td class="separados">
      <a href="editarVenta.php?id={{ $item->id }}" role="button">
        <img src="./images/editar.png" alt="Editar venta"  width="15" height="15" > <p class="textoOperaciones">Modificar</p>
      </a>
    </td>
 </form> 
 {!! Form::close() !!}
 

@include('footer')

<script type="text/javascript">
  $(document).ready(function(){
    $(".campofecha").calendarioDW();
  })
  </script>
   <script type="text/javascript" src="calendario_dw/calendario_dw.js"></script>
</body>

</html>



