<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require '../vendor/autoload.php';

$app = new \Slim\App;

function crearPresupuestoJSON($productos)
{
  $presupuesto = [];
  $total = 0;
  foreach ($productos as $each) {
    $precio = round(random_float(1, 5000), 2);
    $total_producto = $precio * $each['cantidad'];
    $each['precio'] = $precio;
    $each['total'] = $total_producto;
    $total = $total + $total_producto;
    $presupuesto[] = $each;
  }

  return array(
      'objetos' => $presupuesto,
      'total_final' => $total);
}

$app->post('/presupuesto', function (Request $request, Response $response) {

	$precio = (string)(rand(100, 5000));
    
	//$datos = $request->getParsedBodyParam('datos', []);
	//$presupuesto = crearPresupuestoJSON($datos);
	/*$datos = $request->getParsedBody();
	$presupuesto = [];
	$presupuesto['nombre'] = $request->getParam('nombre');
	$presupuesto['descripcion'] = $request->getParam('descripcion');
	$presupuesto['cantidad'] = $request->getParam('cantidad');
	$presupuesto['precio'] = rand(100, 100000) * $presupuesto['cantidad'];*/
	$presupuesto = array('precio' => $precio);
    return $response->withJson($presupuesto, 200);
});
$app->run();