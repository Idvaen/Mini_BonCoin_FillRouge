<?php

require_once 'Database.php';
require_once 'ModelException.php';

class Annonce extends Database
{

    public function getAnnonces()
    {
        $sql = 'SELECT * FROM annonce ORDER BY id_annonce DESC';
        $annonces = $this->executerRequete($sql);
        return $annonces;
    }
}