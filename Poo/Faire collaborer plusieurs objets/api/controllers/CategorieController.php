<?php

require_once __DIR__ . '/../../backend/classes/GestionCategorie.php';

$gestionCategorie = new GestionCategorie();
$categories = $gestionCategorie->getAll();

foreach ($categories as $categorie) {
    echo $categorie->getNom() . '<br>';
}
