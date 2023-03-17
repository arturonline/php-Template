<?php

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

$routes = [
    "/" => "controllers/index.php",
    "/about" => "controllers/about.php",
    "/blog" => "controllers/blog.php",
    "/post" => "controllers/post.php",
    "/contact" => "controllers/contact.php"
];


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
        abort();
    }
}


/**
 * Aborts the request and returns the appropriate error code
 * @param $code
 * @return void
 */
function abort(): void
{
    http_response_code();

    require 'views/404.php';

    die();
}


routeToController($uri, $routes);