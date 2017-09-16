<script type="text/javascript" src="{{asset('jq/jquery.1.9.0.js')}}"></script>
  <script type="text/javascript" src="{{asset('jq/jquery.prmenu.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('jq/jqStyle.js')}}"></script>
  <link type="text/css" rel="stylesheet" href="{{asset('css/prmenu.css')}}" />
  
<nav>

<ul id="top-menu">

    <li><a href="{{url('/productos')}}">PRODUCTOS</a>
      <ul>
        <li><a href="{{url('/productos')}}">LISTADO</a></li>
        <li><a href="{{url('/faltantes')}}">FALTANTES</a></li>
        <li><a href="{{url('/stockMinimo')}}">STOCK MINIMO</a></li>
        <li><a href="{{url('/agregarProducto')}}">AGREGAR NUEVO</a></li>
      </ul>  
    </li>
    <li><a href="{{url('/ventas')}}">VENTAS</a>
      <ul>
        <li><a href="{{url('/ventas')}}">LISTADO</a></li>
        <li><a href="{{url('/agregarVenta')}}">AGREGAR NUEVA</a></li>
      </ul>  
    </li>
    <li><a href="{{url('/gastos')}}">GASTOS</a>
      <ul>
        <li><a href="{{url('/gastos')}}">LISTADO</a></li>
        <li><a href="{{url('/agregarCompra')}}">AGREGAR NUEVO</a></li>
      </ul>  
    </li>
    <li><a href="{{url('/menuListado')}}">MENU</a>
    <ul>
        <li><a href="{{url('/menuListado')}}">LISTADO  DE MENUS</a></li>
        <li><a href="{{url('/menu')}}">AGREGAR NUEVO MENU</a></li>
        <li><a href="{{url('/menuDelDia')}}">MENU DEL DIA</a></li>
        
      </ul>  
      </li>
    <li><a href="{{url('/usuarios')}}">USUARIOS</a>
      <ul>
        <li><a href="{{url('/usuarios')}}">LISTADO</a></li>
        <li><a href="{{url('/agregarUsuario')}}">AGREGAR NUEVO</a></li>
      </ul>  
    </li>
    <li><a href="{{url('/pedidos')}}">PEDIDOS</a></li>
    <li><a href="#">BALANCE</a>
      <ul>
        <li><a href="{{url('/balanceVentas')}}">VENTAS</a></li>
        <li><a href="{{url('/balanceGanancias')}}">GANANCIAS</a></li>
      </ul>  
    </li>
    <li><a href="#">LISTADOS PDF</a>
      <ul>
        <li><a href="{{url('/balanceVentasPDF')}}">VENTAS</a></li>
        <li><a href="{{url('/balanceGananciasPDF')}}">GANANCIAS</a></li>
      </ul>  
    </li>
    <li><a href="{{url('/')}}">INDEX PUBLICO</a></li>
    <li><a href="{{url('/configuracion')}}">CONFIGURACION</a></li>
    <li><a href="{{url('/logout')}}">LOGOUT</a></li>

  </ul>
</nav>
