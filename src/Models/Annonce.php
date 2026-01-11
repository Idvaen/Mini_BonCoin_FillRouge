<?php

require_once '../src/Models/Database.php';
require_once '../src/Models/ModelException.php';

class Annonce extends Database
{

    // public function findAll()
    // {
    //     $sql = 'SELECT * FROM annonce ORDER BY `annonce`.`Id_ANNONCE` ASC';
    //     $annonces = $this->executerRequete($sql);
    //     return $annonces;
    // }

        public function findAll()
    {
        $sql = 'SELECT Id_ANNONCE as id, titre, description, date_public as date, prix, photo, nom_category, pseudo , annonce.Id_Utilisateur
                FROM `annonce` JOIN utilisateur ON utilisateur.Id_Utilisateur = annonce.Id_Utilisateur 
                JOIN category ON category.Id_category = annonce.Id_category ORDER BY `annonce`.`Id_ANNONCE` ASC;';
        $annonces = $this->executerRequete($sql);
        return $annonces;
    }

    public function getAnnoncesHome()
    {
        $sql = 'SELECT Id_ANNONCE as id, titre, description, date_public as date, prix, photo, nom_category, pseudo , annonce.Id_Utilisateur
                FROM `annonce` JOIN utilisateur ON utilisateur.Id_Utilisateur = annonce.Id_Utilisateur 
                JOIN category ON category.Id_category = annonce.Id_category ORDER BY annonce.date_public DESC';
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
        $date = date('Y-m-d H:i:s');
        $stmt = $this->executerRequete($sql, array($titre, $description, $prix, $photo, $date, $Id_category, $Id_Utilisateur));
        if ($stmt instanceof PDOStatement) {
            return $stmt->rowCount() > 0;
        }
        return false;
    }

    public function lastInsertion(){
        return $this->getBdd()->lastInsertId();
    }

    public function findById(int $id): ?array
    {
        $sql = 'SELECT Id_ANNONCE as id, titre, description, date_public as date, prix, photo, nom_category, pseudo, annonce.Id_Utilisateur 
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
        $sql = 'SELECT Id_ANNONCE as id, titre, description, date_public as date, prix, photo, pseudo, email, nom_category FROM `annonce` 
                JOIN utilisateur ON utilisateur.Id_Utilisateur = annonce.Id_Utilisateur 
                JOIN category ON category.Id_category = annonce.Id_category 
                WHERE utilisateur.Id_Utilisateur = ?;';
        $annonces = $this->executerRequete($sql, array($userId));
        if ($annonces->rowCount() > 0)
            return $annonces->fetchAll();
        else
            throw new Exception("Aucun annonce ne correspond à l'identifiant '$userId'");
    }

    public function findByCategoryId(int $categoryId)
    {
        $sql = "SELECT Id_ANNONCE as id, titre, description, date_public as date, prix, photo, nom_category, pseudo, annonce.Id_Utilisateur 
                FROM `annonce` JOIN utilisateur ON utilisateur.Id_Utilisateur = annonce.Id_Utilisateur 
                JOIN category ON category.Id_category = annonce.Id_category
                WHERE annonce.Id_category = ?;";
        $annonces = $this->executerRequete($sql, array($categoryId));
        if ($annonces->rowCount() > 0)
            return $annonces->fetchAll();
        else
            throw new Exception("Aucun annonce ne correspond à l'identifiant '$categoryId'");
    }

    public function deleteAnnonce(int $id): bool
    {
        $sql = 'DELETE FROM annonce WHERE Id_ANNONCE = ?';
        $stmt = $this->executerRequete($sql, array($id));
        return $stmt->rowCount() > 0;
    }
}