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

    // vue register.php
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
    public function profil(): void
    {
        if (!isset($_SESSION['user_id'])) {
            throw new Exception("Vous devez être connecté pour accéder au profil");
        }
        
        $user = $this->user->findById($_SESSION['user_id']);
        $vue = new View("profil");
        $vue->generer(array('user' => $user));
    }

    // Traitement POST login
    public function connexion(string $email, string $password): void
    {
        // Validation
        if (empty($email) || empty($password)) {
            $vue = new View("login");
            $vue->generer(array('erreur' => 'Email et mot de passe requis'));
            return;
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $vue = new View("login");
            $vue->generer(array('erreur' => 'Email invalide'));
            return;
        }

        try {
            $user = $this->user->findByEmail($email);
            
            // Vérifier le mot de passe
            // Vérifier si c'est un hash bcrypt
            if (password_verify($password, $user['password'])) {
                // C'est un hash correct
                $passwordValid = true;
            } else if ($password === $user['password']) {
                // C'est un plaintext (ancien mot de passe)
                // Hasher et mettre à jour la BD
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
                $this->user->updatePassword($user['Id_Utilisateur'], $hashedPassword);
                $passwordValid = true;
            } else {
                $passwordValid = false;
            }
            
            if ($passwordValid) {
                // Créer la session
                $_SESSION['user_id'] = $user['Id_Utilisateur'];
                $_SESSION['user_email'] = $user['email'];
                $_SESSION['user_pseudo'] = $user['pseudo'];
                
                // Redirection vers profil
                header('Location: index.php?action=profil');
                exit();
            } else {
                $vue = new View("login");
                $vue->generer(array('erreur' => 'Mot de passe incorrect'));
            }
        } catch (Exception $e) {
            $vue = new View("login");
            $vue->generer(array('erreur' => 'Email ou mot de passe incorrect'));
        }
    }

    // Traitement POST inscription
    public function inscrit(string $pseudo, string $email, string $password): void
    {
        // Validation
        if (empty($pseudo) || empty($email) || empty($password)) {
            $vue = new View("register");
            $vue->generer(array('erreur' => 'Tous les champs sont requis'));
            return;
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $vue = new View("register");
            $vue->generer(array('erreur' => 'Email invalide'));
            return;
        }

        if (strlen($password) < 4) {
            $vue = new View("register");
            $vue->generer(array('erreur' => 'Le mot de passe doit contenir au moins 4 caractères'));
            return;
        }

        try {
            // Vérifier si l'email existe déjà
            $this->user->findByEmail($email);
            $vue = new View("register");
            $vue->generer(array('erreur' => 'Cet email est déjà utilisé'));
            return;
        } catch (Exception $e) {
            // Email n'existe pas, on peut continuer
        }

        // Hasher le mot de passe
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        if ($this->user->createUser($pseudo, $email, $hashedPassword)) {
            // Récupérer l'utilisateur créé
            $user = $this->user->findByEmail($email);
            
            // Créer la session
            $_SESSION['user_id'] = $user['Id_Utilisateur'];
            $_SESSION['user_email'] = $user['email'];
            $_SESSION['user_pseudo'] = $user['pseudo'];
            
            // Redirection vers profil
            header('Location: index.php?action=profil');
            exit();
        } else {
            $vue = new View("register");
            $vue->generer(array('erreur' => "Erreur d'inscription"));
        }
    }

    // Déconnexion
    public function logout(): void
    {
        session_destroy();
        header('Location: index.php');
        exit();
    }
}