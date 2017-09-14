<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'indexController@mostrar');
Route::get('/productos', 'productosController@mostrarListado')->middleware('adminGestion');
Route::get('/faltantes', 'faltantesController@mostrar')->middleware('adminGestion');
Route::get('/stockMinimo', 'stockMinimoController@mostrar')->middleware('adminGestion');
Route::get('/usuarios', 'usuariosController@mostrar')->middleware('adminGestion');
Route::get('/pedidos', 'pedidosController@mostrar')->middleware('adminGestion');
Route::get('/configuracion', 'configuracionController@mostrar')->middleware('rolAdmin');
Route::get('/login', 'Auth\AuthController@getLogin');
Route::post('/login', 'loginController@authenticate');
Route::get('/logout', 'loginController@postLogout');
Route::get('/inhabilitarUsuario/{idUsuario}', 'inhabilitarUsuario@inhabilitar');
Route::get('/habilitarUsuario/{idUsuario}', 'habilitarUsuario@habilitar')->middleware('adminGestion');
Route::get('/editarUsuario/{idUsuario}/{exito?}/{nodisponible?}', 'editarUsuario@mostrar')->middleware('adminGestion');
Route::post('/editandoUsuario', 'editarUsuario@editar')->middleware('adminGestion');
Route::get('/borrarUsuario/{id}', 'usuariosController@borrarUsuario')->middleware('adminGestion');
Route::get('/agregarProducto', 'productosController@mostrarAgregar')->middleware('adminGestion');
Route::get('/editarProducto/{id}', 'productosController@editar')->middleware('adminGestion');
Route::get('/borrarProducto/{id}', 'productosController@borrar')->middleware('adminGestion');
Route::post('/editandoProducto','productosController@editando')->middleware('adminGestion');
Route::get('/getSubcategorias/{id}', 'categoriasController@getSubcategorias')->middleware('adminGestion');
Route::get('/editarProducto/getSubcategorias/{id}', 'categoriasController@getSubcategorias')->middleware('adminGestion');
Route::post('/agregandoProducto', 'productosController@agregar')->middleware('adminGestion');
Route::get('/detalleProducto/{id}', 'detalleProductoController@detalle')->middleware('adminGestion');
Route::get('/ventas', 'ventaController@mostrarListado')->middleware('adminGestion');
Route::get('/detalleVenta/{id}', 'detalleVentaController@detalle')->middleware('adminGestion');
Route::get('/gastos', 'gastoController@mostrarListado')->middleware('adminGestion');
Route::get('/balanceVentas', 'balanceVentasController@mostrar')->middleware('adminGestion');
Route::post('/balanceVentas', 'balanceVentasController@mostrarGrafico')->middleware('adminGestion');
Route::get('/balanceVentasPDF', 'balanceVentasController@mostrarPDF')->middleware('adminGestion');
Route::post('/balanceVentasPDF', 'balanceVentasController@crearPDF')->middleware('adminGestion');
Route::get('/balanceGananciasPDF', 'balanceGananciasController@mostrarPDF')->middleware('adminGestion');
Route::post('/balanceGananciasPDF', 'balanceGananciasController@crearPDF')->middleware('adminGestion');
Route::get('/menuListado', 'menuListadoController@mostrarListado')->middleware('adminGestion');
Route::get('/menu', 'menuListadoController@agregarMenu')->middleware('adminGestion');
Route::get('/menu/{id}', 'menuListadoController@crearMenu')->middleware('adminGestion');
Route::post('/menu/{id}', 'menuListadoController@agregandoMenu')->middleware('adminGestion');
Route::get('/menuDelDia', 'menuListadoController@mostrarMenuDelDia')->middleware('adminGestion');

Route::get('/editarMenu/{id}', 'menuListadoController@editar')->middleware('adminGestion');
Route::post('/editarMenu','menuListadoController@editando')->middleware('adminGestion');

Route::get('/balanceGanancias', 'balanceGananciasController@mostrar')->middleware('adminGestion');
Route::post('/balanceGanancias', 'balanceGananciasController@mostrarGrafico')->middleware('adminGestion');
Route::get('/agregarVenta', 'ventaController@agregar')->middleware('adminGestion');
Route::get('/agregandoVenta', 'ventaController@agregando')->middleware('adminGestion');
Route::get('/agregarCompra', 'gastoController@agregar')->middleware('adminGestion');
Route::post('/agregandoCompra', 'gastoController@agregando')->middleware('adminGestion');
Route::get('/telegramBot', 'apiController@mostrar');
Route::get('/getProductos/{id}', 'productosController@getProductos')->middleware('adminGestion');
Route::get('/getPrecioProducto/{id}', 'productosController@getPrecioProducto')->middleware('adminGestion');

Route::get('/quienesSomos', function(){return view('quienesSomos');});

Route::get('/registrarse', 'usuariosController@registrarse');
Route::post('/agregandoUsuario', 'usuariosController@registrar');
Route::get('/verificarNombre/{nombre}', 'usuariosController@nombreDisponible');
Route::get('/detalleCompra/{id}', 'gastoController@mostrarDetalle')->middleware('adminGestion');
Route::get('/borrarCompra/{id}', 'gastoController@borrar')->middleware('adminGestion');

