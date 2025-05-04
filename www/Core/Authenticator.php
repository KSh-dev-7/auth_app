<?php

namespace Core;

class Authenticator
{
    public function attempt($email, $password)
    {
        $db = App::resolve(Database::class);
        $user = $db->query("SELECT * FROM users WHERE email = ?", [$email])->find();
        if(!$user || !password_verify($password, $user["password"])) {
            return false;
        }
        self::login($user);
        return true;
    }

    public static function login($user)
    {
        $_SESSION["user"]["email"] = $user["email"];
        session_regenerate_id(true);
    }
    public static function logout()
    {
        unset($_SESSION["user"]);
        $params = session_get_cookie_params();
        setcookie("PHPSESSID", "", time()-3600, $params['path'], $params['domain'], $params['secure'], $params['httponly']);
    }
}
