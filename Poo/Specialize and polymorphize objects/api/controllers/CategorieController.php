<?php

require_once __DIR__ . '/../../backend/classes/GestionCategorie.php';
require_once __DIR__ . '/../../backend/classes/User.php';
require_once __DIR__ . '/../../backend/classes/Auteur.php';

$gestionCategorie = new GestionCategorie();
$categories = $gestionCategorie->getAll();

foreach ($categories as $categorie) {
    echo $categorie->getNom() . '<br>';
}

$users = [
    new User(),
    new Auteur(),
];

foreach ($users as $user) {
    echo $user->getRoleName() . '<br>';
}
