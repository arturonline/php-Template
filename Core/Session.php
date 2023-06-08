<?php

namespace Core;

class Session
{
    public static function has($key)
    {
        return (bool) static::get($key);
    }
    public static function put($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    public static function get($key, $default = null)
    {
        if (isset($_SESSION['_flash'][$key])) {
            return $_SESSION['_flash'][$key];
        }

        return $_SESSION[$key] ?? $default;
    }

    public static function flash($key, $value): void
    {
        $_SESSION['_flash'][$key] = $value;
    }
    public static function unflash(): void
    {
        unset($_SESSION['_flash']);
    }
    public static function flush(): void {
        $_SESSION = [];
    }

    public static function destroy(): void
    {
        // destroy session
        static::flush();
        session_destroy();

        // destroy cookie
        $params = session_get_cookie_params();
        setcookie('PHPSESSID', '', time() - 3600, $params['path'], $params['domain'], $params['secure'], $params['httponly']);
    }
}