<?php

require "../src/Controllers/AnnonceController.php";
require "../src/Controllers/HomeController.php";
require "../src/Controllers/UserController.php";
require "../src/Controllers/ControllerException.php";

class Routeur
{

    private $ctrlHome;
    private $ctrlAnnonce;
    private $ctrlUser;

    public function __construct()
    {
        $this->ctrlHome = new HomeController();
        $this->ctrlAnnonce = new AnnonceController();
        $this->ctrlUser = new UserController();
    }

    // Route une requête entrante : exécution l'action associée
    public function routerRequete()
    {
        try {
            if (isset($_GET['action'])) {
                if ($_GET['action'] == 'annonce') {
                    $idAnnonce = intval($this->getParametre($_GET, 'id'));
                    if ($idAnnonce != 0)
                        $this->ctrlAnnonce;
                    else
                        throw new Exception("Identifiant d'annonce non valide");


                }
                elseif ($_GET['action'] == 'annonces') {

                        // $this->ctrlAnnonce;
                    // else
                        // throw new Exception("Identifiant d'annonce non valide");


                }
            } else {
                $this->ctrlHome->accueil();
            }
        } catch (Exception $e) {
            $this->erreur($e->getMessage());
        }
    }
    private function erreur($msgErreur)
    {
        $vue = new View("page404");
        $vue->generer(array('msgErreur' => $msgErreur));
    }
    private function getParametre($tableau, $nom)
    {
        if (isset($tableau[$nom])) {
            return $tableau[$nom];
        } else
            throw new Exception("Paramètre '$nom' absent");
    }
}

?>