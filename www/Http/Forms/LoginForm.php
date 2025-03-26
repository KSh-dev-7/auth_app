<?php

namespace Http\Forms;

use Core\Validator;

class LoginForm
{
    public function validate($email, $password)
    {
        if(!Validator::email($email)) {
            setValidationError("email", "Please provide a valid email address.");
        }
        if(!Validator::string($password)) {
            setValidationError("password", "Please provide a valid password.");
        }
        if(!empty($_SESSION["validation"])) {
            return false;
        }
        return true;
    }
}