<?php

require_once "../src/Controllers/AnnonceController.php";
require_once "../src/Controllers/HomeController.php";
require_once "../src/Controllers/UserController.php";
require_once "../src/Controllers/ControllerException.php";

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
                        $this->ctrlAnnonce->show($idAnnonce);
                    else
                        throw new Exception("Identifiant d'annonce non valide");
                } elseif ($_GET['action'] == 'annonces') {
                    $this->ctrlAnnonce->index();
                } elseif ($_GET['action'] == 'category') {
                    $idCategory = intval($this->getParametre($_GET, 'id'));
                    if ($idCategory != 0)
                        $this->ctrlAnnonce->showCategory($idCategory);
                    else
                        throw new Exception("Identifiant de category non valide");
                } elseif ($_GET['action'] == 'profil') {
                    $this->ctrlUser->profil();
                } elseif ($_GET['action'] == 'login') {
                    $this->ctrlUser->login();
                } elseif ($_GET['action'] == 'connexion') {
                    $email = $this->getParametre($_POST, 'email');
                    $password = $this->getParametre($_POST, 'password');
                    $this->ctrlUser->connexion($email, $password);
                } elseif ($_GET['action'] == 'register') {
                    $this->ctrlUser->register();
                } elseif ($_GET['action'] == 'inscrit') {
                    $email = $this->getParametre($_POST, 'email');
                    $password = $this->getParametre($_POST, 'password');
                    $pseudo = $this->getParametre($_POST, 'username');
                    $this->ctrlUser->inscrit($pseudo, $email, $password);
                } elseif ($_GET['action'] == 'logout') {
                    $this->ctrlUser->logout();
                } elseif ($_GET['action'] == 'create') {
                    $this->ctrlAnnonce->create();
                } elseif ($_GET['action'] == 'create_annonce') {
                    $titre = $this->getParametre($_POST, 'titre');
                    $description = $this->getParametre($_POST, 'description');
                    $prix = $this->getParametre($_POST, 'prix');
                    $photo = $this->getParametre($_POST, 'annonce_img');
                    $categoryId = $this->getParametre($_POST, 'category');
                    $this->ctrlAnnonce->createAnnonce(
                        $titre,
                        $description,
                        $prix,
                        $photo,
                        $categoryId
                    );
                    $this->ctrlAnnonce->index();
                } else {
                    $this->ctrlHome->index();
                }
            } else {
                $this->ctrlHome->index();
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