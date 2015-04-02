<?php


class Validator
{

    private static $instance = null;

    private function __construct(){}

    static public function getInstance()
    {
        if(is_null(self::$instance))
            self::$instance = new self();

        return self::$instance;
    }

    public function validateEmail($email)
    {
        if(preg_match("/^[a-z0-9-_\.]{1,50}@[a-z0-9_-]{1,20}\.[a-z]{2,4}$/i", $email))
            return true;
        else
            return false;
    }

    public function validateName($name)
    {
        if(preg_match("/^[A-Z]{1}[a-z]{1,20}$/", $name))
            return true;
        else
            return false;
    }

    public function validateLogin($login)
    {
        if(preg_match("/^[a-z0-9-_]{5,19}$/i", $login))
            return true;
        else
            return false;
    }
}

?>