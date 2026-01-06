<?php

require_once '../src/Models/Database.php';
require_once '../src/Models/ModelException.php';

class Annonce extends Database
{

    public function findAll()
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

    public function createAnnonce(
        string $titre,
        string $description,
        float $prix,
        ?string $photo,
        int $Id_category,
        int $Id_Utilisateur
    ): bool {

        $sql = 'INSERT INTO
   ANNONCE (
      titre,
      description,
      prix,
      photo,
      date_public,
      Id_category,
      Id_Utilisateur
   )
VALUES
   (?,?,?,?,?,?,?)';
        $date = date('Y-m-d h:i:s');
        $this->executerRequete($sql, array($titre, $description, $prix, $photo, $date, $Id_category, $Id_Utilisateur));
        return true;
    }

    public function findById(int $id): ?array
    {
        $sql = 'SELECT Id_ANNONCE as id, titre, description, date_public as date, prix, photo, nom_category, pseudo 
                FROM `annonce` JOIN utilisateur ON utilisateur.Id_Utilisateur = annonce.Id_Utilisateur 
                JOIN category ON category.Id_category = annonce.Id_category WHERE Id_ANNONCE=?;';
        $annonce = $this->executerRequete($sql, array($id));
        if ($annonce->rowCount() > 0)
            return $annonce->fetch();
        else
            throw new Exception("Aucun annonce ne correspond à l'identifiant '$id'");
    }

    public function findByUser(int $userId): ?array
    {
        $sql = 'SELECT Id_ANNONCE, titre, pseudo, nom_category FROM `annonce` 
                JOIN utilisateur ON utilisateur.Id_Utilisateur = annonce.Id_Utilisateur 
                JOIN category ON category.Id_category = annonce.Id_category 
                WHERE utilisateur.Id_Utilisateur = ?;';
        $annonces = $this->executerRequete($sql, array($userId));
        if ($annonces->rowCount() > 0)
            return $annonces->fetchAll();
        else
            throw new Exception("Aucun annonce ne correspond à l'identifiant '$userId'");
    }
}