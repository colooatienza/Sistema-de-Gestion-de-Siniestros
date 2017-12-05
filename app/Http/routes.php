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

Route::get('/misPolizas', 'polizasController@mostrarListado');//->middleware('cliente');
Route::get('/misSiniestros', 'siniestrosController@mostrarListado');//->middleware('cliente');
Route::get('/registrarSiniestro/{id}', 'siniestrosController@registrarSiniestro');//->middleware('cliente');
//Route::get('/', 'Auth\AuthController@getLogin');
Route::get('/', 'loginController@loguear');


Route::get('/login', 'Auth\AuthController@getLogin');
Route::post('/login', 'loginController@authenticate');

  Route::post('siniestrosController/registrar', ['uses' => 'siniestrosController@registrar', 'as' => 'create_movie']);







Route::get('/logout', 'loginController@postLogout');
Route::get('/inhabilitarUsuario/{idUsuario}', 'inhabilitarUsuario@inhabilitar');
Route::get('/habilitarUsuario/{idUsuario}', 'habilitarUsuario@habilitar')->middleware('adminGestion');
Route::get('/editarUsuario/{idUsuario}/{exito?}/{nodisponible?}', 'editarUsuario@mostrar')->middleware('adminGestion');
Route::post('/editandoUsuario', 'editarUsuario@editar')->middleware('adminGestion');
Route::get('/borrarUsuario/{id}', 'usuariosController@borrarUsuario')->middleware('adminGestion');
Route::get('/agregarProducto', 'productosController@mostrarAgregar')->middleware('adminGestion');

Route::get('/registrarse', 'usuariosController@registrarse');
Route::post('/agregandoUsuario', 'usuariosController@registrar');
Route::get('/verificarNombre/{nombre}', 'usuariosController@nombreDisponible');

