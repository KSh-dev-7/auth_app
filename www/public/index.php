<?php
session_start();
const BASE_PATH = __DIR__ . "/../";

require_once BASE_PATH . "Core/functions.php";

require_once base_path("vendor/autoload.php");
require_once base_path("bootstrap.php");
require_once base_path("router/routes.php");