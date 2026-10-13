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
    new User(1, 'visiteur@example.com', 'secret', 'Visiteur anonyme'),
    new User(
        2,
        'auteur@example.com',
        'secret',
        'Auteur publié',
        new Auteur(1, 'Dupont', 'Amine', 'Auteur du blog.', 'amine.png')
    ),
];

foreach ($users as $user) {
    echo $user->getRoleName() . '<br>';

    if ($user->getAuteur() !== null) {
        echo $user->getAuteur()->getNomComplet() . '<br>';
    }
}
