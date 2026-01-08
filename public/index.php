<?php

session_start();

require_once 'routeur.php';

$routeur = new Routeur();
$routeur->routerRequete();

