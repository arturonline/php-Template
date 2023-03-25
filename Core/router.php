<?php

$routes = require base_path('routes.php');

/**
 * Routes the request to the appropriate controller
 * @param $uri
 * @param $routes
 * @return void
 */
function routeToController($uri, $routes): void
{
    if(array_key_exists($uri, $routes)) {
        require base_path($routes[$uri]);
    }
    else {
        abort();
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

    require base_path("views/$code.php");

    die();
}

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

routeToController($uri, $routes);