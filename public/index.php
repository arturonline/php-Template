<?php

session_start();

use Core\Router;
use Core\Session;

const BASE_PATH = __DIR__ . '/../';
require BASE_PATH . 'Core/functions.php';
require BASE_PATH . 'vendor/autoload.php';

// Cargamos sistema de inyección de depencias
require base_path('bootstrap.php');

// Cargamos el router y sus rutas
$router = new Router();
$routes = require base_path('routes.php');

// Cargamos página principal
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];

try {
    $router->route($uri, $method);
} catch (\Core\ValidationException $exception) {
    Session::flash('errors', $exception->errors);
    Session::flash('old', $exception->old);

    return redirect($router->previousUrl());
}

Session::unflash();
