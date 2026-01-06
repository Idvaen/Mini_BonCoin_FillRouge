<?php

require_once '../src/Views/ViewException.php';
class View
{

    private $fichier;
    private $titre;

    public function __construct($action)
    {
        $this->fichier = "../src/Views/" . $action . ".php";
    }

    public function generer($donnees)
    {
        $contenu = $this->genererFichier($this->fichier, $donnees);
        $vue = $this->genererFichier(
            '../src/Views/gabarit.php',
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
            $dir = '../public/uploads/';
            $uploads = scandir($dir);
            require $fichier;

            $contenu = ob_get_clean();
            // Récupère $titre défini dans le fichier view
            if (isset($titre)) {
                $this->titre = $titre;
            }
            return $contenu;
        } else {
            throw new Exception("Fichier '$fichier' introuvable");
        }
    }

}