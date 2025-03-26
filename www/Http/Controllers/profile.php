<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);
$user = $db->query("SELECT * FROM users WHERE email = ?", [$_SESSION["user"]["email"]])->find();

view("/pages/profile.view.php", [
    "avatarPath" => $user["avatar"],
]);