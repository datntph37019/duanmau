<?php

class AuthController
{
    public function login()
    {
        include PATH_ROOT . 'views/auth/login.php';
    }

    public function register()
    {
        include PATH_ROOT . 'views/auth/register.php';
    }
}
