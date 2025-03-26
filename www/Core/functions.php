<?php

function dd($value)
{
    echo "<pre>";
    var_dump($value);
    echo "</pre>";
    exit;
}

function base_path(string $path): string
{
    return BASE_PATH . $path;
}

function view($path, $data = [])
{
    extract($data);
    require_once base_path("views/{$path}");
}

function setValidationError($field, $message)
{
    $_SESSION['validation'][$field] = $message;
}

function getValidationError($field)
{
    $value = $_SESSION['validation'][$field];
    unset($_SESSION['validation'][$field]);
    return $value;
}

function hasValidationError($field)
{
    return isset($_SESSION['validation'][$field]);
}

function setOldValue($field, $value)
{
    $_SESSION['old'][$field] = $value;
}

function old($field, $default = "")
{
    $value = $_SESSION["old"][$field] ?? $default;
    unset($_SESSION["old"][$field]);
    return $value;
}

function redirect(string $url)
{
    header("Location: {$url}");
    exit;
}