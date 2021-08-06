<?php

namespace Controllers;

class HomeController
{
    public function showHome()
    {
        include VIEWS_PATH . 'HomeView.php';
    }

    public function showLogin()
    {
        include VIEWS_PATH . 'Login.php';
    }

    public function showRegister()
    {
        include VIEWS_PATH . 'Register.php';
    }
}
