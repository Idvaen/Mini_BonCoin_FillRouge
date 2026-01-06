<?php

require_once '../src/Models/User.php';
require_once '../src/Views/View.php';

class UserController
{

    private $user;

    public function __construct()
    {
        $this->user = new User();
    }

    // vue register.php + traitement POST
    public function register(): void
    {

    }
    // vue login.php + traitement POST
    public function login(): void
    {

    }
    // vue profil.php (besoin user connecté)
    public function profil(): void
    {

    }
    // déconnexion + redirection
    public function logout(): void
    {

    }
}