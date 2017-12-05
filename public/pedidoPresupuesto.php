<?php
 header("Access-Control-Allow-Origin: *");
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require '../vendor/autoload.php';

$app = new \Slim\App;

$app->post('/presupuesto', function (Request $request, Response $response) {

	$precio = (string)(rand(100, 5000));
	$presupuesto = array('precio' => $precio);
    return $response->withJson($presupuesto, 200);
});
$app->run();