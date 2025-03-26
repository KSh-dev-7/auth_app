<?php

namespace Core;

class App
{
    private static $container;

    public static function setContainer($container)
    {
        self::$container = $container;
    }

    public static function getContainer()
    {
        return self::$container;
    }

    public static function bind($key, $resolver)
    {
        self::$container->bind($key, $resolver);
    }

    public static function resolve($key)
    {
        return self::$container->resolve($key);
    }

}