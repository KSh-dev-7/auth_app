<?php

use Core\Validator;
use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$name = trim($_POST["name"]) ?? "";
$email = trim($_POST["email"]) ?? "";
$password = trim($_POST["password"]) ?? "";
$password_confirm = trim($_POST["password_confirm"]) ?? "";
$avatar = $_FILES["avatar"] ?? "";

$uploadPath = base_path("/public/uploads");
$ext = pathinfo($avatar["name"], PATHINFO_EXTENSION);
$fileName = "avatar_" . time() . "." . $ext;
$fullPath = $uploadPath . "/" . $fileName ?? null;

if(!empty($avatar["name"])){
    $types = ["image/png", "image/jpeg", "image/gif"];
    if(!in_array($avatar["type"], $types)){
        setValidationError("avatar","Invalid image type");
    }

    if($avatar["size"] > 1000000){
        setValidationError("avatar","File size too big");
    }

    if(!is_dir($uploadPath)) {
        mkdir($uploadPath, 0777, true);
    }
    move_uploaded_file($avatar["tmp_name"], $fullPath);
}
setOldValue("name", $name);
if(!Validator::string($name, 1, 255))
{
    setValidationError("name", "Name should be more than 1 characters and less than 255 characters.");
}

if(!Validator::string($password, 6, 255))
{
    setValidationError("password", "Password should be more than 6 characters.");
}
setOldValue('email', $email);
if(!Validator::email($email))
{
    setOldValue('email', $email);
    setValidationError("email", "Please provide a valid email address.");
}

if($password !== $password_confirm)
{
    setValidationError("password", "Passwords does not match.");
}

$user = $db->query("SELECT * FROM users WHERE email = ?", [$email])->find();
if($user) {
    setValidationError("email", "This email already exists.");
}

if(!empty($_SESSION["validation"]))
{
    redirect("/register");
}

$db->query("INSERT INTO users (name, email, password, avatar) VALUES (?, ?, ?, ?)", [$name, $email, password_hash($password, PASSWORD_DEFAULT), "uploads/" . $fileName]);

redirect("/login");
