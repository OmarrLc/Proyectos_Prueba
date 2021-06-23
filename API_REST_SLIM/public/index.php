<?php
require '../vendor/autoload.php';
require '../vendor/slim/slim/Slim/Slim.php';

\Slim\Slim::registerAutoloader();
$app = new \Slim\Slim();

// RUTA CLIENTE
require_once '../src/routes/cliente.php';

$app->run();