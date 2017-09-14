<!DOCTYPE html>
<html>
<head>



<meta name="viewport" content="width=device-width,initial-scale=1.0">

<meta charset="UTF-8">
<link rel="stylesheet" href="{{asset('css\styleEscritorio.css')}}" >

<link rel="icon" href="images/logo.jpg" type="image/jpg">
<script type="text/javascript" src="{{asset('js/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/editarProducto.js')}}"></script>


<title>Buffet</title>
</head>
<body>

@include('header')
@include('navGeneral')

<div class="divForm"> 
<h1> Agregar Nuevo Producto</h1>
@if(count($errors) > 0)
		@foreach($errors->all() as $error)
			{{$error}}
		@endforeach
@endif
<div class=formularioAgregar>
 {!! Form::open(['action' => 'productosController@agregar', 'method' => 'POST']) !!}
  <p>Nombre:</p>
  <input type="text" name="nombre" class="imputForm" required>
  <p>Marca:</p>
  <input type="text" name="marca" class="imputForm" required>
  <p>Stock:</p>
  <input type="number" min="0" value="1" name="stock" class="imputForm">
  <p>Stock Minimo:</p>
  <input type="number" min="0" value="1" name="stockMinimo" class="imputForm" required>
   
  <p>Precio de venta unitario:</p>
  <input type= "number" min="0"  value="0.00" step="0.01" name="precio" class="imputForm" required>
  <p>Proveedor:</p>
  <input type="text" name="proveedor" class="imputForm" required>
  <br><br>
  
     <p>Categoría de producto:</p>
  <select id="categorias" required>  
    <option value="">Seleccione Categoría</option>
  @foreach($categorias as $item)
    <option value="{{ $item->id }}">{{ $item->nombre }}</option>
  @endforeach
  </select> 
  <br><br>

    <select id="categoriasHija" name="categoria" class="productos" required>  
    <option value="">Seleccione subcategoría</option>
  </select>
  <br><br>

  <input type="checkbox" name="descuenta" checked> Descuenta Stock al venderse<br>
   
  <p>Descripción:</p>
  <textarea name="descripcion" required rows=6> </textarea> 
  <br><br>
  <input type="submit" value="AGREGAR">
  {!! Form::close() !!}
 </div>
</div>

 

@include('footer')


</body>

</html>



