<?php

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

function view($path, $params = []): void
{
    extract($params);
    require base_path("views/{$path}");
}