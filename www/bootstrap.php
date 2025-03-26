<?php
use Core\App;
use Core\Container;
use Core\Database;

$container = new Container();
$container->bind(Database::class, function (){
    return Database::getInstance();
});

App::setContainer($container);