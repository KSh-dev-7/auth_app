<?php

namespace Core;

use Core\Middleware\Middleware;

class Router
{
    private static $routes = [];
    public static function add($method, $uri, $controller)
    {
        self::$routes[] = [
            'method' => $method,
            'uri' => $uri,
            'controller' => $controller,
            "middleware" => null
        ];
    }

    public static function get($uri, $controller)
    {
        self::add('GET', $uri, $controller);
        return new self();
    }

    public static function post($uri, $controller)
    {
        self::add('POST', $uri, $controller);
        return new self();
    }

    public static function put($uri, $controller)
    {
        self::add('PUT', $uri, $controller);
        return new self();
    }

    public static function patch($uri, $controller)
    {
        self::add('PATCH', $uri, $controller);
        return new self();
    }

    public static function delete($uri, $controller)
    {
        self::add('DELETE', $uri, $controller);
        return new self();
    }

    public function only($key)
    {
        self::$routes[array_key_last(self::$routes)]["middleware"] = $key;
    }

    public static function route($method, $uri)
    {
        foreach (self::$routes as $route) {
            if ($route['method'] == strtoupper($method) && $route['uri'] == $uri) {
                if($route['middleware'] != null) {
                    Middleware::resolve($route['middleware']);
                }

                require_once base_path("Http/Controllers/{$route["controller"]}");
                exit;
            }
        }
        self::abort();
    }

    public static function abort($statusCode = Response::PAGE_NOT_FOUND)
    {
        http_response_code($statusCode);
        require_once base_path("views/errors/{$statusCode}.view.php");
        exit;
    }
}