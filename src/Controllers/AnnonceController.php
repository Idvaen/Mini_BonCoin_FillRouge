<?php

require_once '../src/Models/Annonce.php';
require_once '../src/Views/annonces.php';
require_once '../src/Views/home.php';
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

    }
    // vue create.php + upload + insertion
    public function create(): void
    {

    }

    // vue details.php
    public function show(?int $id): void
    {

    }
}