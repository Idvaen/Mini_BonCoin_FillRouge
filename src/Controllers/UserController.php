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
        $vue = new View("register");
        $vue->generer(array());
    }
    // vue login.php + traitement POST
    public function login(): void
    {
        $vue = new View("login");
        $vue->generer(array());
    }
    // vue profil.php (besoin user connecté)
    public function profil($email): void
    {
        $user = $this->user->findByEmail($email);
        $vue = new View("profil");
        $vue->generer(array('user' => $user));
    }

    public function inscrit($pseudo, $email, $password)
    {
        if ($this->user->createUser($pseudo, $email, $password)) {
            $user = $this->user->findByEmail($email);
            $vue = new View("profil");
            $vue->generer(array('user' => $user));
        } else
            throw new Exception("Erreur d'inscription");
    }
    // déconnexion + redirection
    public function logout(): void
    {

    }
}