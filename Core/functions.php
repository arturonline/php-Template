<?php

use Core\Response;

function dd($value): void
{
    echo "<pre>";
    var_dump($value);
    echo "</pre>";

    die();
}

function urlIs($value): bool
{
    return $_SERVER['REQUEST_URI'] === $value;
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

function authorize($condition, $status = Response::FORBIDDEN): void
{
    if( ! $condition) {
        abort($status);
    }
}

function base_path($path = ''): string
{
    return BASE_PATH . $path;
}

function view($path, $params = [])
{
    extract($params);
    return require base_path("views/{$path}");
}

function login($user): void
{
    // mark user has logged in.
    $_SESSION['user'] = [
        'email' => $user['email']
        ];

    // regenerate session id
    session_regenerate_id(true);
}

function logout(): void
{
    // destroy session
    $_SESSION = [];
    session_destroy();

// destroy cookie
    $params = session_get_cookie_params();
    setcookie('PHPSESSID', '', time() - 3600, $params['path'], $params['domain'], $params['secure'], $params['httponly']);
}