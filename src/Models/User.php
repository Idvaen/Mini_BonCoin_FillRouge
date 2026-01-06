<?php

require_once '../src/Models/Database.php';
require_once '../src/Models/ModelException.php';

class User extends Database
{
    public function createUser(string $pseudo, string $email, string $password): bool
    {
        $sql = 'INSERT INTO UTILISATEUR (pseudo, password, email, date_inscrit) VALUES (?,?,?,?)';
        $date_inscrit = date('Y-m-d h:i:s');
        $user = $this->executerRequete($sql, array($pseudo, $password, $email, $date_inscrit));
        return true;
    }

    public function findByEmail(string $email): ?array
    {
        // Logique pour trouver un utilisateur par email
        return null;
    }

    public function findById(int $id): ?array
    {
        // Logique pour trouver un utilisateur par ID
        return null;
    }
}