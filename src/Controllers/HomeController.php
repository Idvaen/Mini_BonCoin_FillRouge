<?php

require_once '../src/Models/Annonce.php';
require_once '../src/Views/annonces.php';
require_once '../src/Views/home.php';
require_once '../src/Views/View.php';

class HomeController
{

    private $annonce;

    public function __construct()
    {
        $this->annonce = new Annonce();
    }

    // vue home.php
    public function accueil()
    {
        $annonces = $this->annonce->getAnnonces();
        $vue = new View("home");
        $vue->generer(array('annonces' => $annonces));
    }

}