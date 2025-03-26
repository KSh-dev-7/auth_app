<?php
return [
    "host" => "mysql",
    "dbname" => "auth_app",
    "user" => "root",
    "password" => "root",
    "charset" => "utf8",
    "options" => [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ]
];