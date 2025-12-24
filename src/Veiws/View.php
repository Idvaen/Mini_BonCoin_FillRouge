<?php

require_once 'ViewException.class.php';
class View
{

    private $fichier;
    private $titre;

    public function __construct($action)
    {
        $this->fichier = "View/view" . $action . ".php";
    }

    public function generer($donnees)
    {
        $contenu = $this->genererFichier($this->fichier, $donnees);
        $vue = $this->genererFichier(
            'View/gabarit.php',
            array('titre' => $this->titre, 'contenu' => $contenu)
        );
        echo $vue;
    }

    // Génère un fichier vue et renvoie le résultat produit
    private function genererFichier($fichier, $donnees)
    {
        if (file_exists($fichier)) {
            extract($donnees);
            ob_start();
            require $fichier;
            return ob_get_clean();
        } else {
            throw new Exception("Fichier '$fichier' introuvable");
        }
    }

}