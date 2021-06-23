<?php

$app = new \Slim\Slim();

header("Content-Type: application/json");
require_once("../src/models/Cliente.php");


//OBTENER TODOS LOS CLIENTES
$app->get('/cliente',function(){

    $cliente = new Cliente();

    $respuesta = $cliente -> getClientes();
    echo $respuesta;
});

//OBTENER TODOS LOS CLIENTES
$app->post('/cliente/id', function() use($app){
    $cliente = new Cliente();

    $body = $app->request()->getBody();
    $req = json_decode ($body,true);

    $respuesta = $cliente -> getClienteId($req['id']);

    echo $respuesta;
});

//CREAR NUEVO CLIENTE
$app->post('/cliente/nuevo', function() use($app){
    $cliente = new Cliente();

    $body = $app->request()->getBody();
    $req = json_decode ($body,true);

    $respuesta = $cliente -> insertCliente($req['nombre'], $req['apellido'], $req['telefono'], $req['email']);

    echo $respuesta;
});

//MODIFICA CLIENTE
$app->delete('/cliente/eliminar', function() use($app){
    $cliente = new Cliente();

    $body = $app->request()->getBody();
    $req = json_decode ($body,true);

    $respuesta = $cliente -> deleteCliente($req['id']);

    echo $respuesta;
});