<?php

class User{
    public function createUser(string $pseudo, string $email, string $password): bool{
        // Logique pour créer un utilisateur dans la base de données
        return true;
    }

    public function findByEmail(string $email): ?array{
        // Logique pour trouver un utilisateur par email
        return null;
    }

    public function findById(int $id): ?array{
        // Logique pour trouver un utilisateur par ID
        return null;
    }
}