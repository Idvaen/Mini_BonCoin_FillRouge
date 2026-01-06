<?php

require_once '../src/Models/Annonce.php';
require_once '../src/Views/View.php';


class AnnonceController
{
    private $annonce;

    public function __construct()
    {
        $this->annonce = new Annonce();
    }

    // vue annonces.php
    public function index(): void
    {
        $annonces = $this->annonce->findAll();
        $vue = new View("annonces");
        $vue->generer(array('annonces' => $annonces));
        $annonces->closeCursor();
    }
    // vue create.php + upload + insertion
    public function create(): void
    {

    }

    // vue details.php
    public function show(?int $id): void
    {
        $annonce = $this->annonce->findById($id);
        $vue = new View("details");
        $vue->generer(array('annonce' => $annonce));
    }
}