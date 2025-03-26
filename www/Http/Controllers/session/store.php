<?php

use Core\App;
use Core\Database;
use Core\Authenticator;
use Http\Forms\LoginForm;

$db = App::resolve(Database::class);

$email = trim($_POST["email"]) ?? "";
$password = trim($_POST["password"]) ?? "";

$user = $db->query("SELECT * FROM users WHERE email = ?", [$email])->find();
$form = new LoginForm();
if($form->validate($email, $password)) {
    $auth = new Authenticator();
    if($auth->attempt($email, $password)) {
        $_SESSION["user"]["name"] = $user["name"];
        $_SESSION["user"]["email"] = $user["email"];
        redirect("/");
    } else {
        setValidationError("login", "Wrong email or password.");
        setOldValue("email", $email);
    }
}

redirect("/login");