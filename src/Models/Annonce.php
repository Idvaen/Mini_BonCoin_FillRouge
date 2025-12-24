<?php

require_once 'src/Models/Database.php';
require_once 'src/Models/ModelException.php';

class Annonce extends Database
{

    public function getAnnonces()
    {
        $sql = 'SELECT * FROM annonce ORDER BY id_annonce DESC';
        $annonces = $this->executerRequete($sql);
        return $annonces;
    }
}