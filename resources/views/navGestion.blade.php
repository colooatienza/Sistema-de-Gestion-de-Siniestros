 <script type="text/javascript" src="{{asset('jq/jquery.1.9.0.js')}}"></script>
  <script type="text/javascript" src="{{asset('jq/jquery.prmenu.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('jq/jqStyle.js')}}"></script>
  <link type="text/css" rel="stylesheet" href="{{asset('css/prmenu.css')}}" />
  
<nav>

  <ul id="top-menu">

    <li><a href="productos">PRODUCTOS</a>
      <ul>
        <li><a href="productos">LISTADO</a></li>
        <li><a href="faltantes">FALTANTES</a></li>
        <li><a href="stockMinimo">STOCK MINIMO</a></li>
        <li><a href="agregarProducto">AGREGAR NUEVO</a></li>
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
        <li><a href="seleccionarMenu.php">AGREGAR NUEVO MENU</a></li>
        <li><a href="menuDelDia.php">MENU DEL DIA</a></li>
      </ul>  
    </li>
    <li><a href="#pedidos.html">PEDIDOS</a></li>
    <li><a href="#">BALANCE</a>
      <ul>
        <li><a href="#ingresos.php">INGRESOS</a></li>
        <li><a href="#egresos.php">EGRESOS</a></li>
      </ul>  
    </li>
    <li><a href="editarUsuarioOnline.php" role="button">Mi Perfil</a></li>
    <li><a href="{{url('/logout')}}">LOGOUT</a></li>
    
  </ul>


</nav>
