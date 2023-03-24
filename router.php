<?php

$routes = require 'routes.php';

/**
 * Routes the request to the appropriate controller
 * @param $uri
 * @param $routes
 * @return void
 */
function routeToController($uri, $routes): void
{

    if(array_key_exists($uri, $routes)) {
        require $routes[$uri];
    }
    else {
        abort(404);
    }
}


/**
 * Aborts the request and returns the appropriate error code
 * @param int $code 404, 403, 500, etc.
 * @return void
 */
function abort(int $code = 404): void
{
    http_response_code($code);

    require "views/{$code}.php";

    die();
}

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

routeToController($uri, $routes);