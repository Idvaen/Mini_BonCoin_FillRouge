<?php

class HomeController
{

    private $annonce;

    public function __construct()
    {
        $this->annonce = new Annonce();
    }
    public function accueil()
    {
        $annonces = $this->annonce->getAnnonces();
        $vue = new View("Accueil");
        $vue->generer(array('billets' => $annonces));
    }
}