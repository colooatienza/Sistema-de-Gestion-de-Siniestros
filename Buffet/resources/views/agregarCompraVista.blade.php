<!DOCTYPE html>
<html>
<head>



<meta name="viewport" content="width=device-width,initial-scale=1.0">

<meta charset="UTF-8">
<link rel="stylesheet" href="{{asset('css\styleEscritorio.css')}}" >

	<link rel="icon" href="{{asset('images/logo.jpg')}}" type="image/jpg">
	<script type="text/javascript" src="{{asset('js/jquery.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/agregarVenta.js')}}"></script>
	<script type="text/javascript" src="{{asset('jq/jquery.1.9.0.js')}}"></script>                                        
	<link rel="stylesheet" href="{{asset('css/compra.css')}}">

	<link href="{{asset('calendario_dw/calendario_dw-estilos.css')}}" type="text/css" rel="STYLESHEET">
	 
	<script type="text/javascript" src="{{asset('calendario_dw/jquery-1.4.4.min.js')}}"></script>
<title>Buffet | Agregar Compra</title>
</head>

<body>

  @include('header')
	@include('navGeneral')

<h2> Agregar Nueva Compra</h2>

 <form method="POST" action="{{url('/agregandoCompra')}}" class="agregarpro"  enctype="multipart/form-data" >
    {{ csrf_field() }}
  <input type="hidden" name="cantProductos" id="cantProductos" value="1">
  <p>Fecha:</p>
  <input type="text" name="fecha" class="campofecha" size="12" required> <br/><br/>
  <p>Nombre Proveedor</p> 
  <input type="text" name="proveedor" required><br/><br/>
  <p>CUIT del Proveedor:</p>
  <input type="number" name="proveedor_cuit"><br/><br/>
  <p>Tipo:</p>
  <select name="tipo" required>  

   @foreach($tipos as $item)
    
  <option value="{{ $item->id }}">{{ $item->nombre }}</option>
  @endforeach
  </select> <br><br/>
  <p>Factura Escaneada</p>
  <input type="file" name="factura"  accept="image/*" required>

  <div id="divProductos" class="divProductos" >

<div id="formProducto1" class="formularioProducto">
   
  <button type="button" id="sacar1" class="sacar" value="1">X</button>
  <select class="categorias" subid="1" required>  
    <option >Seleccione Categoría</option>
  @foreach($categorias as $item)
    <option value="{{ $item->id }}">{{ $item->nombre }}</option>
  @endforeach
  </select> 

    <select id="subcategoria1" class="subcategorias"  idselect="1" required>  
    <option >Seleccione subcategoría</option>
  </select> 
    <select name="producto1" id="productos1"  class="productos" idselect="1">  
    <option value="">Seleccione producto</option>
  </select> 

  <p>Precio unitario:
  <input type= "number" min="0.00" value="0.00" step="0.01" name="precio1" id="precio1" class="imputForm"></p>
  <p>Cantidad:
  <input type="number" value="1" min="1" name="cantidad1" class="imputForm"></p>
  
 
 </div>
 </div>
  <button type="button" id="btnNuevo" >Nuevo Producto</button><br><br>
  <input type="submit" value="AGREGAR">
 </form> 

 

@include('footer')
<script type="text/javascript">
  $(document).ready(function(){
    $(".campofecha").calendarioDW();
  })
  </script>
  <script type="text/javascript" src="{{asset('calendario_dw/calendario_dw.js')}}"></script>

</body>

</html>



