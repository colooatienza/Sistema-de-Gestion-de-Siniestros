


<!DOCTYPE html>
<html>
<head>



<meta name="viewport" content="width=device-width,initial-scale=1.0">

<meta charset="UTF-8">
<link rel="stylesheet" href="{{asset('css\styleEscritorio.css')}}" >
<link rel="stylesheet" href="{{asset('css\styleResponsive.css')}}"  >

<link rel="stylesheet" href="{{asset('css/producto.css')}}" >

<link rel="icon" href="{{asset('images/logo.jpg')}}" type="image/jpg">
<script type="text/javascript" src="{{asset('js/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/editarProducto.js')}}"></script>



<meta name="viewport" content="width=device-width,initial-scale=1.0">



<script type="text/javascript" src="{{asset('./js/productos.js')}}"></script>
</head>


<title>Buffet | Editar producto</title>
</head>
<body>

@include ('header')
@include ('navGeneral')

<br/><br/>
<h2> Editar Producto</h2>
<br/>@if(count($errors) > 0)
		@foreach($errors->all() as $error)
			{{$error}}
		@endforeach
@endif<br/>

<div class="formularioProducto">
{!! Form::open(['action' => 'productosController@editando', 'method' => 'POST']) !!}
  <form method="POST" onSubmit="return validar()" action="../editandoProducto" class="agregarpro"  enctype="multipart/form-data" >
  {!! Form::hidden('id', $producto->id ); !!}
  <p>Nombre:</p>
  <input type="text" name="nombre" class="imputForm" value="{{ $producto->nombre }}" required>
  <p>Marca:</p>
  <input type="text" name="marca" class="imputForm" value="{{ $producto->marca}}" required>
  <p>Stock:</p>
  <input type="number" value="{{ $producto->stock}}" name="stock" class="imputForm">
  <p>Stock Minimo:</p>
  <input type="number" value="{{ $producto->stock_minimo}}" name="stockMinimo" class="imputForm">
   
  <p>Precio de venta unitario:</p>
  <input type= "number" value="{{ $producto->precio }}" step="0.01" name="precio" class="imputForm" >
  <p>Proveedor:</p>
  <input type="text" name="proveedor" value="{{ $producto->proveedor}}" class="imputForm" required><br><br>

     <p>Categoría de producto:</p>


     <select id="categorias" required>  
    <option value="{{$producto->categoria->get_categoria_padre->id}}">{{ $producto->categoria->get_categoria_padre->nombre}}</option>
  @foreach ($categorias as $categoria)
    @if ($categoria->id != $producto->categoria->get_categoria_padre->id )
      <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
     @endif
  @endforeach
  </select> 
    <select id="categoriasHija" name="categoria" class="productos" required> 

    <option value="{{$producto->categoria_id}}">{{ $producto->categoria->nombre}}</option>
    @foreach ( $subCategorias as $sub)
     @if ($sub->id != $producto->categoria_id )
        <option value="{{ $sub->id }}">{{$sub->nombre }}</option>
      @endif   
      @endforeach
  </select>
  
  <br><br>
  <input type="checkbox" name="descuenta" @if ($producto->descuentaStock==1 )checked @endif > Descuenta Stock al venderse<br><br>
  <p>Descripción:</p>
  <textarea rows="4" cols="50" name="descripcion">{{ $producto->descripcion}} </textarea>
  <br><br>
  <input type="submit" value="GUARDAR CAMBIOS">
</form> 
@if($cambios)
    <p>Se han guardado los cambios exitosamente</p>
@endif
</div>
@include('footer')
</body>

</html>





