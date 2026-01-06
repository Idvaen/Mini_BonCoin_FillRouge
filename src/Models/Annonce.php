<?php

require_once 'Database.php';
require_once 'ModelException.php';

class Annonce extends Database
{

    public function getAnnonces()
    {
        $sql = 'SELECT * FROM annonce ORDER BY `annonce`.`Id_ANNONCE` ASC';
        $annonces = $this->executerRequete($sql);
        return $annonces;
    }

    public function getAnnoncesHome()
    {
        $sql = 'SELECT * FROM annonce ORDER BY annonce.date_public DESC';
        $annonces = $this->executerRequete($sql);
        return $annonces;
    }

    public function createAnnonce(string $titre, string $description, float $prix, ?string $photo, int $userId): bool
    {

        return true;
    }

    public function findAll(): array
    {
        return [];
    }

    public function findById(int $id): ?array
    {
        return null;
    }

    public function findByUser(int $userId): array
    {
        return [];
    }
}