<?php

use Core\Router;

$method = $_POST["_method"] ?? $_SERVER["REQUEST_METHOD"];
$method = strtoupper($method);
$uri = parse_url($_SERVER["REQUEST_URI"])["path"];

Router::get("/", "/home.php");
Router::get("/profile", "/profile.php")->only("auth");

Router::get("/register", "/registration/create.php")->only("guest");
Router::post("/register", "/registration/store.php");

Router::get("/login", "/session/create.php")->only("guest");
Router::post("/login", "/session/store.php");
Router::delete("/logout", "/session/destroy.php");

Router::route($method, $uri);