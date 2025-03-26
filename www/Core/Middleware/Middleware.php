<?php

namespace Core\Middleware;

class Middleware
{
    const MAP = [
        "auth" => Auth::class,
        "guest" => Guest::class,
    ];

    public static function resolve($key)
    {
        if(!$key) {
            return;
        }

        $middleware = self::MAP[$key];

        if(!$middleware) {
            throw new Exception("Not found middleware for key: {$key}");
        }

        (new $middleware)->handle();
    }
}