<?php

require_once '../src/Models/Database.php';
require_once '../src/Models/ModelException.php';

class User extends Database
{
    public function createUser(string $pseudo, string $email, string $password): bool
    {
        $sql = 'INSERT INTO UTILISATEUR (pseudo, password, email, date_inscrit) VALUES (?,?,?,?);';
        $date_inscrit = date('Y-m-d h:i:s');
        $this->executerRequete($sql, array($pseudo, $password, $email, $date_inscrit));
        return true;
    }

    public function findByEmail(string $email): array|bool|null
    {
        $sql = 'SELECT * FROM `utilisateur` WHERE email = ?';
        $user = $this->executerRequete($sql, array($email));
        if ($user->rowCount() > 0)
            return $user->fetch();
        else
            throw new Exception("Aucun utilisateur ne correspond à email - '$email'");
    }

    public function findById(int $id): ?array
    {
        $sql = 'SELECT * FROM `utilisateur` WHERE Id_Utilisateur = ?';
        $user = $this->executerRequete($sql, array($id));
        if ($user->rowCount() > 0)
            return $user->fetch();
        else
            throw new Exception("Aucun utilisateur ne correspond à id - $id");
    }

    public function updatePassword(int $userId, string $hashedPassword): bool
    {
        $sql = 'UPDATE utilisateur SET password = ? WHERE Id_Utilisateur = ?';
        $stmt = $this->executerRequete($sql, array($hashedPassword, $userId));
        return $stmt->rowCount() > 0;
    }
}