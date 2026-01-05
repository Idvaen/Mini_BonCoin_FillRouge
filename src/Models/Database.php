<?php

/**
 * Classe abstraite Modèle.
 * Centralise les services d'accès à une base de données.
 * Utilise l'API PDO
 *
 */
abstract class Database
{
    private $bdd;

    protected function executerRequete($sql, $params = null)
    {
        if ($params == null) {
            $resultat = $this->getBdd()->query($sql);
        } else {
            $resultat = $this->getBdd()->prepare($sql);
            $resultat->execute($params);
        }
        return $resultat;
    }

    private function getBdd()
    {
        $param_ini = parse_ini_file("../src/Param/param.ini", true);
        extract($param_ini["MiniBonCoin"]);
        if ($this->bdd == null) {
            $this->bdd = new PDO(
                "mysql:host=$DBHOST;dbname=$DBNAME;charset=utf8",
                "$DBUSER",
                "$DBPWD",
                array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)
            );
        }
        return $this->bdd;
    }

}