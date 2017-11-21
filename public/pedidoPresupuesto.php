<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require '../vendor/autoload.php';

$app = new \Slim\App;

$app->post('/presupuesto', function (Request $request, Response $response) {

	$datos = $request->getParsedBody();
	$presupuesto = [];
	$presupuesto['nombre'] = $request->getParam('nombre');
	$presupuesto['descripcion'] = $request->getParam('descripcion');
	$presupuesto['cantidad'] = $request->getParam('cantidad');
	$presupuesto['precio'] = rand(100, 100000) * $presupuesto['cantidad'];


    return json_encode($presupuesto);
});
$app->run();