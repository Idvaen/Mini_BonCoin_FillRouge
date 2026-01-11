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
        if (!isset($_SESSION['user_id'])) {
            throw new Exception("Vous devez être connecté pour créer une annonce");
        }
        
        $vue = new View(action: "create");
        $vue->generer(array('user_id' => $_SESSION['user_id']));
    }

    public function createAnnonce(
        string $titre,
        string $description,
        float $prix,
        ?string $photo,
        int $Id_category,
        ?int $Id_Utilisateur = null
    ) {
        // Utiliser l'ID de la session si pas fourni
        if ($Id_Utilisateur === null) {
            if (!isset($_SESSION['user_id'])) {
                throw new Exception("Vous devez être connecté pour créer une annonce");
            }
            $Id_Utilisateur = $_SESSION['user_id'];
        }

        $annonce = $this->annonce->createAnnonce(
            $titre,
            $description,
            $prix,
            $photo,
            $Id_category,
            $Id_Utilisateur
        );

        $id = $this->annonce->lastInsertion();
        if ($annonce) {
            $annonce = $this->annonce->findById($id);
            $vue = new View("details");
            $vue->generer(array('annonce' => $annonce));
        } else
            throw new Exception("Nie pas reussi a cree l'annonce!");

    }

    // vue details.php
    public function show(?int $id): void
    {
        $annonce = $this->annonce->findById($id);
        $vue = new View("details");
        $vue->generer(array('annonce' => $annonce));
    }

    public function showCategory(?int $id): void
    {
        $annonces = $this->annonce->findByCategoryId($id);
        $vue = new View("category");
        $vue->generer(array('annonces' => $annonces, 'id_cat' => $id));
    }
}